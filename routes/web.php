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

// Route Katalog (Pulsa, Voucher, Entertainment)
Route::get('/katalog/{type}', function ($type) {
    $catalogs = [
        'pulsa' => [
            'title' => 'Katalog Pulsa & Data',
            'icon' => 'phone_iphone',
            'items' => [
                ['name' => 'Telkomsel', 'image' => 'telkomsel.png'],
                ['name' => 'Indosat Ooredoo', 'image' => 'indosat.png'],
                ['name' => 'Tri (3)', 'image' => 'tri.png'],
                ['name' => 'XL Axiata', 'image' => 'xl.png'],
                ['name' => 'Axis', 'image' => 'axis.png'],
                ['name' => 'Smartfren', 'image' => 'smartfren.png'],
                ['name' => 'By.U', 'image' => 'byu.png']
            ]
        ],
        'voucher' => [
            'title' => 'Katalog Voucher',
            'icon' => 'confirmation_number',
            'items' => [
                ['name' => 'Google Play', 'image' => 'google-play.png'],
                ['name' => 'Steam Wallet', 'image' => 'steam.png'],
                ['name' => 'Garena Shells', 'image' => 'garena.png'],
                ['name' => 'PlayStation Network', 'image' => 'psn.png'],
                ['name' => 'Spotify Premium', 'image' => 'spotify.png'],
                ['name' => 'Netflix', 'image' => 'netflix.png']
            ]
        ]
    ];

    if (!array_key_exists($type, $catalogs)) {
        abort(404);
    }

    return view('katalog', ['data' => $catalogs[$type], 'type' => $type]);
})->name('katalog.show');

// Mock API Route for Nickname Checker
Route::post('/api/check-nickname', [\App\Http\Controllers\ApiController::class, 'checkNickname']);

// Route Checkout
Route::post('/checkout', [\App\Http\Controllers\TransactionController::class, 'store'])->name('checkout');

// Route Invoice (Cek Resi)
Route::get('/invoice/{reference}', [\App\Http\Controllers\TransactionController::class, 'showInvoice'])->name('invoice.show');

// Mock API Route for Simulate Payment Success
Route::post('/api/simulate-payment/{reference}', [\App\Http\Controllers\TransactionController::class, 'simulatePayment']);
