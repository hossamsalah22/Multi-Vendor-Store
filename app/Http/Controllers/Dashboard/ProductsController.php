<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Product\CreateRequest;
use App\Http\Requests\Dashboard\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::withTrashed()->with(['category', 'store'])->paginate(10);
        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $stores = Store::all();
        return view('dashboard.products.create', compact('categories', 'stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $validate = $request->validated();
        $image = $request->file('image');
        $product = Product::create($validate);
        $image && $product->addMedia($image)->toMediaCollection('products');
        return redirect()->route('dashboard.products.index')->with('success', 'Product has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::withTrashed()->with(['category', 'store'])->where('slug', $id)->firstOrFail();
        return view('dashboard.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $stores = Store::all();
        return view('dashboard.products.edit', compact('categories', 'stores', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $validate = $request->validated();
        $image = $request->file('image');
        $product->update($validate);
        if ($image) {
            $product->clearMediaCollection('products');
            $product->addMedia($image)->toMediaCollection('products');
        }
        return redirect()->route('dashboard.products.index')->with('success', 'Product has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->update(['active' => 0]);
        $product->delete();
        return back()->with('success', 'Product has been deleted.');
    }

    /**
     * Activate the specified resource from storage.
     */
    public function activate(Product $product)
    {
        $product->update(['active' => $product->active ? 0 : 1]);
        return back()->with('success', 'Product status has been updated.');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $product = Product::withTrashed()->where('slug', $id)->firstOrFail();
        $product->restore();
        return back()->with('success', 'Product has been restored.');
    }
}
