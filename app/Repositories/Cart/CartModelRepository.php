<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class CartModelRepository implements CartRepository
{

    protected $items;

    public function __construct()
    {
        $this->items = collect([]);
    }


    public function get(): Collection
    {
        // TODO: Implement get() method.
        if (!$this->items->count()) {
            $this->items = Cart::with('product')
                ->get();
        }
        return $this->items;
    }

    public function add(Product $product, int $quantity = 1)
    {
        // TODO: Implement add() method.
        $item = Cart::where('product_id', $product->id)->first();
        if (!$item) {
            $cart = Cart::create([
                'product_id' => $product->id,
                'user_id' => Auth::id(),
                'quantity' => $quantity,
            ]);
            return $this->get()->push($cart);
        }
        return $item->increment('quantity', $quantity);
    }

    public function update($id, int $quantity)
    {
        // TODO: Implement update() method.
        Cart::where('id', $id)
            ->update([
                'quantity' => $quantity,
            ]);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        Cart::where('id', $id)
            ->delete();
    }

    public function empty()
    {
        // TODO: Implement empty() method.
        Cart::query()
            ->delete();
    }

    public function total()
    {
        // TODO: Implement total() method.
        return $this->get()
            ->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });
    }

}
