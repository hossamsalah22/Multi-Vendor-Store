<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\OrdersController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\StoresController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

Route::get('admin/home', function () {
    return view('dashboard');
})->middleware(['auth:admin'])->name('home');

Route::group(['prefix' => 'admin/dashboard', 'as' => 'dashboard.', 'middleware' => ['auth:admin']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('categories/{category}/activate', [CategoriesController::class, 'activate'])->name('categories.activate');
    Route::put('categories/{category}/restore', [CategoriesController::class, 'restore'])->name('categories.restore');
    Route::resource('categories', CategoriesController::class);
    Route::put('stores/{store}/activate', [StoresController::class, 'activate'])->name('stores.activate');
    Route::put('stores/{store}/restore', [StoresController::class, 'restore'])->name('stores.restore');
    Route::resource('stores', StoresController::class);
    Route::put('products/{product}/activate', [ProductsController::class, 'activate'])->name('products.activate');
    Route::put('products/{product}/restore', [ProductsController::class, 'restore'])->name('products.restore');
    Route::resource('products', ProductsController::class);
    Route::resource('orders', OrdersController::class)->only(['index', 'show', 'destroy']);
});


Route::group(['prefix' => 'admin/profile', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
