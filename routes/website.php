<?php


use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\CheckoutController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'website.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('products', ProductController::class)->only(['index', 'show']);
    Route::resource('cart', CartController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::get('checkout', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});
