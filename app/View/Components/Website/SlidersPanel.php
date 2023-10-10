<?php

namespace App\View\Components\Website;

use App\Models\Slider;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SlidersPanel extends Component
{
    public $sliders;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->sliders = Slider::active()->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.website.sliders-panel');
    }
}
