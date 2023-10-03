<?php

namespace App\Repositories\Cart;

use App\Models\Product;
use Illuminate\Support\Collection;

interface CartRepository
{
    public function get(): Collection;

    public function add(Product $product, int $quantity = 1);

    // update quantity
    public function update($id, int $quantity);

    public function delete($id);

    // clear cart
    public function empty();

    // get total price
    public function total();

}
