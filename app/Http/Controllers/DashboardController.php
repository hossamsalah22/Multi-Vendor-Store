<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $products = Product::all()->count();
        $users = User::all()->count();
        $categories = Category::all()->count();
        $stores = Store::all()->count();
        return view('dashboard.index', compact('products', 'users', 'categories', 'stores'));
    }
}
