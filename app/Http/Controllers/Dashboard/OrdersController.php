<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\MainController;
use App\Models\Order;

class OrdersController extends MainController
{
    public function __construct()
    {
        parent::__construct('orders');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['user', 'store', 'products', 'addresses'])->paginate(10);
        return view('dashboard.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('dashboard.orders.show', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
