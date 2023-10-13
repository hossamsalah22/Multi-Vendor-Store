<?php

use App\Http\Controllers\Api\AdminsController;
use App\Http\Controllers\Api\BannersController;
use App\Http\Controllers\Api\SlidersController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\StoresController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('admins/{admin}/ban', [AdminsController::class, 'ban']);
Route::put('admins/{admin}/restore', [AdminsController::class, 'restore']);
Route::apiResource('admins', AdminsController::class);
Route::put('users/{user}/ban', [UsersController::class, 'ban']);
Route::put('sliders/{slider}/activate', [SlidersController::class, 'activate']);
Route::put('sliders/{slider}/restore', [SlidersController::class, 'restore']);
Route::apiResource('sliders', SlidersController::class);
Route::put('banners/{banner}/activate', [BannersController::class, 'activate']);
Route::put('banners/{banner}/restore', [BannersController::class, 'restore']);
Route::apiResource('banners', BannersController::class);
Route::apiResource('users', UsersController::class)->only(['index', 'show']);
Route::apiResource('products', ProductsController::class);
Route::apiResource('categories', CategoriesController::class);
Route::apiResource('stores', StoresController::class);
