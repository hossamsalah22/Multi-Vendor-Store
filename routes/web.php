<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\StoresController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('dashboard');
})->middleware(['auth'])->name('home');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('categories/{category}/activate', [CategoriesController::class, 'activate'])->name('categories.activate');
    Route::resource('categories', CategoriesController::class);
    Route::put('stores/{store}/activate', [StoresController::class, 'activate'])->name('stores.activate');
    Route::resource('stores', StoresController::class);
    Route::put('products/{product}/activate', [ProductsController::class, 'activate'])->name('products.activate');
    Route::resource('products', ProductsController::class);

});

Route::group(['prefix' => 'profile'], function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
