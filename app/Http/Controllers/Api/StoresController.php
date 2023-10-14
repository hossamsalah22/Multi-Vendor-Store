<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Store\CreateRequest;
use App\Http\Requests\Dashboard\Store\UpdateRequest;
use App\Models\Store;
use Illuminate\Http\Request;

class StoresController extends Controller
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
        $stores = Store::with('admins')->paginate(10);
        return $stores;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $validate = $request->validated();
        $image = $request->file('image');
        $store = Store::create($validate);
        $image && $store->addMedia($image)->toMediaCollection('stores');
        return $store;
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        return $store->load('admins');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Store $store)
    {
        $validate = $request->validated();
        $image = $request->file('image');
        $store->update($validate);
        if ($image) {
            $store->clearMediaCollection('stores');
            $store->addMedia($image)->toMediaCollection('stores');
        }
        return $store;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $store->delete();
        return response()->json(['message' => 'Store deleted successfully']);
    }
}
