<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Banner\CreateRequest;
use App\Http\Requests\Dashboard\Banner\UpdateRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::withTrashed()->paginate(10);
        return $banners;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $validate = $request->validated();
        $image = $request->file('image');
        $banner = Banner::create($validate);
        $image && $banner->addMedia($image)->toMediaCollection('banners');
        return $banner;
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        return $banner;
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
        return $banner;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return response()->json(['message' => 'Banner Deleted Successfully']);
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        Banner::onlyTrashed()->where('slug', $id)->restore();
        return response()->json(['message' => 'Banner Restored Successfully']);
    }

    /**
     * Active/Inactive the specified resource from storage.
     */
    public function activate(Banner $banner)
    {
        $banner->update(['active' => $banner->active ? 0 : 1]);
        return response()->json(['message' => 'Banner Activated/Unactivated Successfully']);
    }
}
