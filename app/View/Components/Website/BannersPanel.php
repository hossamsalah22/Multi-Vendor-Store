<?php

namespace App\View\Components\Website;

use App\Models\Banner;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BannersPanel extends Component
{
    public $banners;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->banners = Banner::active()->latest()->take(2)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.website.banners-panel');
    }
}
