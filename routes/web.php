<?php

use App\Http\Controllers\ChangeLanguageController;
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


// Website Routes
require __DIR__ . '/website.php';
// Dashboard Routes
require __DIR__ . '/dashboard.php';



// Auth Routes
//require __DIR__ . '/auth.php';
