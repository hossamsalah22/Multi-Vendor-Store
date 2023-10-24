<?php

use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\ChangeLanguageController;
use App\Http\Controllers\Website\Auth\TwoFactorAuthController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\CheckoutController;
use App\Http\Controllers\Website\CurrencyConverterController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('change-language/{locale}', ChangeLanguageController::class)
    ->name('change-language');


Route::group(['as' => 'website.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('products', ProductController::class)->only(['index', 'show']);
    Route::resource('cart', CartController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::get('checkout', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('auth/2fa', [TwoFactorAuthController::class, 'index'])
        ->middleware('auth:web')
        ->name('two-factor.index');
    Route::post('currency', [CurrencyConverterController::class, 'store'])->name('currency.store');
});

Route::get('auth/{provider}/redirect', [SocialLogincontroller::class, 'redirect'])->name('social.login');
Route::get('auth/{provider}/callback', [SocialLogincontroller::class, 'callback'])->name('social.callback');
