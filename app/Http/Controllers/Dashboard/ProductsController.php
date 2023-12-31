<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\MainController;
use App\Http\Requests\Dashboard\Product\CreateRequest;
use App\Http\Requests\Dashboard\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductsController extends MainController
{
    public function __construct()
    {
        parent::__construct('products');
    }

    protected function validData($validate)
    {
        $data['name']['en'] = Arr::pull($validate, 'name_en');
        $data['name']['ar'] = Arr::pull($validate, 'name_ar');
        $data['description']['en'] = Arr::pull($validate, 'description_en');
        $data['description']['ar'] = Arr::pull($validate, 'description_ar');
        $data['category_id'] = Arr::pull($validate, 'category_id');
        $data['store_id'] = Arr::pull($validate, 'store_id');
        $data['price'] = Arr::pull($validate, 'price');
        $data['compare_price'] = Arr::pull($validate, 'compare_price');
        $data['quantity'] = Arr::pull($validate, 'quantity');

        return $data;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::withTrashed()->filter($request->query())->with(['category', 'store'])->paginate(10);
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
        Product::create($this->validData($validate));
        return redirect()->route('dashboard.products.index')->with('success', __('messages.created_successfully'));
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
        $product->update($this->validData($validate));
        if ($image) {
            $product->clearMediaCollection('products');
            $product->addMedia($image)->toMediaCollection('products');
        }
        return redirect()->route('dashboard.products.index')->with('success', __('messages.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->update(['active' => 0]);
        $product->delete();
        return back()->with('success', __('messages.deleted_successfully'));
    }

    /**
     * Activate the specified resource from storage.
     */
    public function activate(Product $product)
    {
        $product->update(['active' => $product->active ? 0 : 1]);
        return back()->with('success', __('messages.updated_successfully'));
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $product = Product::withTrashed()->where('slug', $id)->firstOrFail();
        $product->restore();
        return back()->with('success', __('messages.restored_successfully'));
    }
}
