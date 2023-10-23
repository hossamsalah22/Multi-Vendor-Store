<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\MainController;
use App\Http\Requests\Dashboard\Banner\CreateRequest;
use App\Http\Requests\Dashboard\Banner\UpdateRequest;
use App\Models\Banner;

class BannerController extends MainController
{
    public function __construct()
    {
        parent::__construct('banners');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::withTrashed()->paginate(10);
        return view('dashboard.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $validate = $request->validated();
        $banner = Banner::create($validate);
        return redirect()->route('dashboard.banners.index')->with('success', __('messages.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        return view('dashboard.banners.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('dashboard.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Banner $banner)
    {
        $validate = $request->validated();
        $image = $request->file('image');
        $banner->update($validate);
        if ($image) {
            $banner->clearMediaCollection('banners');
            $banner->addMedia($image)->toMediaCollection('banners');
        }
        return redirect()->route('dashboard.banners.index')->with('success', __('messages.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return back()->with('success', __('messages.deleted_successfully'));
    }

    /**
     * activate the specified resource from storage.
     */
    public function activate(Banner $banner)
    {
        $banner->update(['active' => $banner->active ? 0 : 1]);
        return back()->with('success', __('messages.updated_successfully'));
    }


    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        Banner::onlyTrashed()->where('slug', $id)->restore();
        return back()->with('success', __('messages.restored_successfully'));
    }
}
