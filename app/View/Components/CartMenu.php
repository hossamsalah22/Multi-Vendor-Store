<?php

namespace App\View\Components;

use App\Facades\Cart;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CartMenu extends Component
{
    public $items;
    public $total;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->items = Cart::get();
        $this->total = Cart::total();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.cart-menu');
    }
}
