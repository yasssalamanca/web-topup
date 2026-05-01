<?php

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
    return view('home');
});

Route::get('/order/{game}', [\App\Http\Controllers\OrderController::class, 'show'])->name('order.show');
Route::get('/joki/{game}', [\App\Http\Controllers\JokiController::class, 'show'])->name('joki.show');

// Mock API Route for Nickname Checker
Route::post('/api/check-nickname', [\App\Http\Controllers\ApiController::class, 'checkNickname']);

// Route Checkout
Route::post('/checkout', [\App\Http\Controllers\TransactionController::class, 'store'])->name('checkout');
