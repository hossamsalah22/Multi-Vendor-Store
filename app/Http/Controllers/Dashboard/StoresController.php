<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\MainController;
use App\Http\Requests\Dashboard\Store\CreateRequest;
use App\Http\Requests\Dashboard\Store\UpdateRequest;
use App\Models\Store;

class StoresController extends MainController
{
    public function __construct()
    {
        parent::__construct('stores');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::withTrashed()->withCount('products')->with('admins')->paginate();
        return view('dashboard.stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.stores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $validate = $request->validated();
        $store = Store::create($validate);
        return redirect()->route('dashboard.stores.index')->with('success', __('messages.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $store = Store::withTrashed()->where('slug', $id)->with('admins')->firstOrFail();
        return view('dashboard.stores.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        return view('dashboard.stores.edit', compact('store'));
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
        return redirect()->route('dashboard.stores.index')->with('success', __('messages.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $store->update(['active' => 0]);
        $store->delete();
        return back()->with('success', __('messages.deleted_successfully'));
    }

    /**
     * Change Status of the specified resource from storage.
     */
    public function activate(Store $store)
    {
        $store->update(['active' => $store->active ? 0 : 1]);
        return back()->with('success', __('messages.updated_successfully'));
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $store = Store::onlyTrashed()->where('slug', $id)->firstOrFail();
        $store->restore();
        return back()->with('success', __('messages.restored_successfully'));
    }
}
