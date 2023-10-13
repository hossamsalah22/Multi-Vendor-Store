<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Slider\CreateRequest;
use App\Http\Requests\Dashboard\Slider\UpdateRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::withTrashed()->paginate(10);
        return $sliders;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $validate = $request->validated();
        $image = $request->file('image');
        $slider = Slider::create($validate);
        $image && $slider->addMedia($image)->toMediaCollection('sliders');
        return $slider;
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return $slider;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Slider $slider)
    {
        $validate = $request->validated();
        $image = $request->file('image');
        $slider->update($validate);
        if ($image) {
            $slider->clearMediaCollection('sliders');
            $slider->addMedia($image)->toMediaCollection('sliders');
        }
        return $slider;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return response()->json(['message' => 'Slider deleted successfully']);
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        Slider::onlyTrashed()->where('slug', $id)->restore();
        return response()->json(['message' => 'Slider restored successfully']);
    }

    /**
     * Active/Inactive the specified resource from storage.
     */
    public function activate(Slider $slider)
    {
        $slider->update(['active' => $slider->active ? 0 : 1]);
        return response()->json(['message' => 'Slider Activated\Unactivated Successfully']);
    }
}
