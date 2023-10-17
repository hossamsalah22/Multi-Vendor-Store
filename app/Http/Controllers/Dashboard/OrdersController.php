<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
        $this->middleware('permission:orders.index')->only('index');
        $this->middleware('permission:orders.show')->only('show');
        $this->middleware('permission:orders.delete')->only('destroy');
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
