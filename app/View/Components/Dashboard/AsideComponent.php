<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AsideComponent extends Component
{
    public $items;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->items = config('aside');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.aside-component');
    }
}
