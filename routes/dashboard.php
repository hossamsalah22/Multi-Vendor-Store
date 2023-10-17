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

Route::group(['prefix' => 'admin/dashboard', 'as' => 'dashboard.', 'middleware' => ['auth:admin']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('categories/{category}/activate', [CategoriesController::class, 'activate'])->name('categories.activate');
    Route::put('categories/{category}/restore', [CategoriesController::class, 'restore'])->name('categories.restore');
    Route::put('stores/{store}/activate', [StoresController::class, 'activate'])->name('stores.activate');
    Route::put('stores/{store}/restore', [StoresController::class, 'restore'])->name('stores.restore');
    Route::put('products/{product}/activate', [ProductsController::class, 'activate'])->name('products.activate');
    Route::put('products/{product}/restore', [ProductsController::class, 'restore'])->name('products.restore');
    Route::put('sliders/{slider}/activate', [SlidersController::class, 'activate'])->name('sliders.activate');
    Route::put('sliders/{slider}/restore', [SlidersController::class, 'restore'])->name('sliders.restore');
    Route::put('banners/{banner}/activate', [BannerController::class, 'activate'])->name('banners.activate');
    Route::put('banners/{banner}/restore', [BannerController::class, 'restore'])->name('banners.restore');
    Route::put('users/{user}/ban', [UsersController::class, 'ban'])->name('users.ban');
    Route::put('admins/{admin}/ban', [AdminsController::class, 'ban'])->name('admins.ban');
    Route::put('admins/{admin}/restore', [AdminsController::class, 'restore'])->name('admins.restore');
    Route::resources([
        'categories' => CategoriesController::class,
        'stores' => StoresController::class,
        'products' => ProductsController::class,
        'sliders' => SlidersController::class,
        'banners' => BannerController::class,
        'admins' => AdminsController::class
    ]);
    Route::resource('orders', OrdersController::class)->only(['index', 'show', 'destroy']);
    Route::resource('users', UsersController::class)->only(['index', 'show']);
});


Route::group(['prefix' => 'admin/profile', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
