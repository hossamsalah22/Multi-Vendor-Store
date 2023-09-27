<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Category\CreateRequest;
use App\Http\Requests\Dashboard\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withTrashed()->with('parent')->paginate(10);
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentCategories = Category::where("active", 1)->get();
        return view('dashboard.categories.create', compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $validate = $request->validated();
        $image = $request->file('image');
        $category = Category::create($validate);
        $image && $category->addMedia($image)->toMediaCollection('categories');
        return redirect()->route('dashboard.categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::withTrashed()->where('slug', $id)->firstOrFail();
        return view('dashboard.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $parentCategories = Category::where("active", 1)
            ->where("id", "!=", $category->id)
            ->where(function ($query) use ($category) {
                $query->whereNull("parent_id")
                    ->orWhere("parent_id", "!=", $category->id);
            })
            ->get();
        return view('dashboard.categories.edit', compact('category', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Category $category)
    {
        $validate = $request->validated();
        $image = $request->file('image');
        $category->update($validate);
        if ($image) {
            $category->clearMediaCollection('categories');
            $category->addMedia($image)->toMediaCollection('categories');
        }

        return redirect()->route('dashboard.categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->update(['active' => 0]);
        $category->delete();
        return back()->with('success', 'Category deleted successfully');
    }

    /**
     * Activate the specified resource from storage.
     */
    public function activate(Category $category)
    {
        $category->update(['active' => $category->active ? 0 : 1]);
        return back()->with('success', 'Category Status Updated successfully');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($slug)
    {
        $category = Category::onlyTrashed()->where('slug', $slug)->firstOrFail();
        $category->restore();
        return back()->with('success', 'Category Restored successfully');
    }

}
