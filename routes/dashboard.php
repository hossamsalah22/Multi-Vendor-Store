<?php

use App\Http\Controllers\Dashboard\AdminsController;
use App\Http\Controllers\Dashboard\BannerController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\OrdersController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\SlidersController;
use App\Http\Controllers\Dashboard\StoresController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('admin/home', function () {
    return view('dashboard');
})->middleware(['auth:admin'])->name('home');

Route::customResources([
    ['categories', CategoriesController::class, 'category'],
    ['stores', StoresController::class, 'store'],
    ['products', ProductsController::class, 'product'],
    ['sliders', SlidersController::class, 'slider'],
    ['banners', BannerController::class, 'banner'],
    ['roles', RolesController::class, 'role'],
    ['orders', OrdersController::class, 'order'],
    ['admins', AdminsController::class, 'admin'],
    ['users', UsersController::class, 'user'],
]);

Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.dashboard')->middleware('auth:admin');


Route::group(['prefix' => 'admin/profile', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
