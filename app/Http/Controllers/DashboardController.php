<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    public function index()
    {
        $products = Product::count();
        $users = User::count();
        $categories = Category::count();
        $stores = Store::count();
        $orders = Order::count();
        $admins = Admin::count();
        return view('dashboard.index', compact('products', 'users', 'categories', 'stores', 'orders', 'admins'));
    }
}
