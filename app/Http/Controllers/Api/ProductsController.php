<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Product\CreateRequest;
use App\Http\Requests\Dashboard\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Product::filter($request->query())
            ->with('store:id,name,slug', 'category:id,name,slug')
            ->active()
            ->available()
            ->paginate(10);
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
        return $product;
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product->load('store:id,name,slug', 'category:id,name,slug');
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
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Product has been deleted.']);
    }
}
