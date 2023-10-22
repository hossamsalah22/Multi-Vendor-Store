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
    ['categories', CategoriesController::class, ['activate', 'restore']],
    ['stores', StoresController::class, ['activate', 'restore']],
    ['products', ProductsController::class, ['activate', 'restore']],
    ['sliders', SlidersController::class, ['activate', 'restore']],
    ['banners', BannerController::class, ['activate', 'restore']],
    ['roles', RolesController::class, ['activate', 'restore']],
    ['orders', OrdersController::class, ['activate', 'restore']],
    ['admins', AdminsController::class, ['ban', 'restore']],
    ['users', UsersController::class, ['ban', 'restore'], ['create', 'store', 'edit', 'update']],
], 'admin/dashboard', 'dashboard.', 'auth:admin');


Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.dashboard')->middleware('auth:admin');


Route::group(['prefix' => 'admin/profile', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
