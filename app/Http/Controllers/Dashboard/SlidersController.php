<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\MainController;
use App\Http\Requests\Dashboard\Slider\CreateRequest;
use App\Http\Requests\Dashboard\Slider\UpdateRequest;
use App\Models\Slider;
use Illuminate\Support\Arr;

class SlidersController extends MainController
{
    public function __construct()
    {
        parent::__construct('sliders');
    }

    public function validData($validate)
    {
        $data['title']['en'] = Arr::pull($validate, 'title_en');
        $data['title']['ar'] = Arr::pull($validate, 'title_ar');
        $data['description']['en'] = Arr::pull($validate, 'description_en');
        $data['description']['ar'] = Arr::pull($validate, 'description_ar');
        $data['price'] = Arr::pull($validate, 'price');
        return $data;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::withTrashed()->paginate(10);
        return view('dashboard.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $validate = $request->validated();
        $data = $this->validData($validate);
        Slider::create($data);
        return redirect()->route('dashboard.sliders.index')->with('success', __('messages.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view('dashboard.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('dashboard.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Slider $slider)
    {
        $validate = $request->validated();
        $data = $this->validData($validate);
        $image = $request->file('image');
        $slider->update($data);
        if ($image) {
            $slider->clearMediaCollection('sliders');
            $slider->addMedia($image)->toMediaCollection('sliders');
        }
        return redirect()->route('dashboard.sliders.index')->with('success', __('messages.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('dashboard.sliders.index')->with('success', __('messages.deleted_successfully'));
    }

    /**
     * Activate the specified resource from storage.
     */
    public function activate(Slider $slider)
    {
        $slider->update(['active' => $slider->active ? 0 : 1]);
        return back()->with('success', __('messages.updated_successfully'));
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $slider = Slider::onlyTrashed()->where('slug', $id)->firstOrFail();
        $slider->restore();
        return back()->with('success', __('messages.restored_successfully'));
    }
}
