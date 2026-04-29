<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WebhookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Kita bungkus semuanya di dalam prefix 'v1' (Version 1)
Route::prefix('v1')->group(function () {

    // ==========================================
    // 1. ZONA ETALASE (Public Routes)
    // ==========================================
    Route::prefix('catalog')->group(function () {
        Route::get('/categories', [CategoryController::class, 'index']);
        
        // Pake Route Model Binding custom (nyari berdasarkan slug, bukan ID)
        Route::get('/categories/{category:slug}/products', [CategoryController::class, 'getProducts']);
    });

    Route::get('/payment-methods', [PaymentMethodController::class, 'index']);


    // ==========================================
    // 2. ZONA KASIR (Transaction Routes)
    // ==========================================
    Route::prefix('transactions')->group(function () {
        Route::post('/', [TransactionController::class, 'store']); // Bikin pesanan
        Route::get('/{reference_id}', [TransactionController::class, 'show']); // Liat detail tagihan
    });


    // ==========================================
    // 3. ZONA PINTU BELAKANG (Webhook Routes)
    // ==========================================
    Route::prefix('webhooks')->group(function () {
        Route::post('/tripay', [WebhookController::class, 'handleTripay']);
        // Kalau besok lu mau nambah Midtrans, tinggal taruh di sini:
        // Route::post('/midtrans', [WebhookController::class, 'handleMidtrans']);
    });

});