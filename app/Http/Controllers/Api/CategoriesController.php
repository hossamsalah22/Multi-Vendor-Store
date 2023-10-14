<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Category\CreateRequest;
use App\Http\Requests\Dashboard\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('children:id,name,slug,parent_id', 'parent:id,name,slug')
            ->paginate(10);
        return $categories;
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
        return $category;
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category->load('children:id,name,slug,parent_id', 'parent:id,name,slug');
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
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->noContent();
    }
}
