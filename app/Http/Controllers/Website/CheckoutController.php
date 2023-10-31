<?php

namespace App\Http\Controllers\Website;

use App\Events\OrderCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Order\CreateRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Intl\Countries;
use Throwable;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CartRepository $cart)
    {
        if (!$cart->get()->count())
            return redirect()->route('website.home')->with('error', 'Cart is empty.');

        return view('website.checkout.create', [
            'cart' => $cart,
            'countries' => Countries::getNames(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(Request $request, CartRepository $cart)
    {
        $stores = $cart->get()->groupBy('product.store_id')->all();
        DB::beginTransaction();
        try {
            // Create the order...
            foreach ($stores as $store_id => $products) {
                $total_price = 0;
                $order = Order::create([
                    'user_id' => auth('web')?->user()?->id ?? null,
                    'store_id' => $store_id,
                ]);

                // Create the order products...
                foreach ($products as $item) {
                    OrderProduct::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product->id,
                        'name' => $item->product->name,
                        'quantity' => $item->quantity,
                        'price' => $item->product->price,
                    ]);
                    $total_price += $item->product->price * $item->quantity;
                }
                // Create the order addresses...
                foreach ($request->post('addr') as $type => $address) {
                    $address['type'] = $type;
                    $order->addresses()->create($address);
                }
                $order->update(['total' => $total_price]);
            }

            event(new OrderCreated($order));

            DB::commit();

            return redirect('/myfatoorah?orderId=' . $order->id);

        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
