<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CartModelRepository implements CartRepository
{

    public function get(): Collection
    {
        // TODO: Implement get() method.
        return Cart::with('product')
            ->where('cookie_id', $this->getCookieId())
            ->get();
    }

    public function add(Product $product, int $quantity = 1)
    {
        // TODO: Implement add() method.
        $item = Cart::where('product_id', $product->id)
            ->where('cookie_id', $this->getCookieId())->first();
        if (!$item) {
            return Cart::create([
                'cookie_id' => $this->getCookieId(),
                'product_id' => $product->id,
                'user_id' => Auth::id(),
                'quantity' => $quantity,
            ]);
        }
        return $item->increment('quantity', $quantity);
    }

    public function update(Product $product, int $quantity)
    {
        // TODO: Implement update() method.
        Cart::where('product_id', $product->id)
            ->where('cookie_id', $this->getCookieId())
            ->update([
                'quantity' => $quantity,
            ]);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        Cart::where('id', $id)
            ->where('cookie_id', $this->getCookieId())
            ->delete();
    }

    public function empty()
    {
        // TODO: Implement empty() method.
        Cart::where('cookie_id', $this->getCookieId())
            ->destroy();
    }

    public function total()
    {
        // TODO: Implement total() method.
        return Cart::where('cookie_id', $this->getCookieId())
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->selectRaw('SUM(carts.quantity * products.price) as total')
            ->value('total');
    }

    protected function getCookieId()
    {
        $cookie_id = Cookie::get('cart_id');
        if (!$cookie_id) {
            $cookie_id = Str::uuid();
            Cookie::queue('cart_id', $cookie_id, 60 * 24 * 30);
        }
        return $cookie_id;
    }
}
