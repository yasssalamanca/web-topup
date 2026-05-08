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
        ],
        'entertainment' => [
            'title' => 'Katalog Entertainment',
            'icon' => 'movie',
            'items' => [
                ['name' => 'Netflix', 'image' => 'netflix.png'],
                ['name' => 'Spotify', 'image' => 'spotify.png'],
                ['name' => 'YouTube Premium', 'image' => 'youtube.png'],
                ['name' => 'Disney+ Hotstar', 'image' => 'disney.png'],
                ['name' => 'Vidio', 'image' => 'vidio.png'],
                ['name' => 'WeTV', 'image' => 'wetv.png'],
                ['name' => 'Iflix', 'image' => 'iflix.png'],
                ['name' => 'Apple TV+', 'image' => 'AppleTV.png']
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

// Cek Transaksi
Route::get('/cek-transaksi', function () {
    return view('cek-transaksi');
})->name('cek.transaksi');

// Leaderboard (Under Development)
Route::get('/leaderboard', function () {
    return view('coming-soon', [
        'title' => 'Leaderboard',
        'icon' => 'leaderboard',
        'description' => 'Fitur Leaderboard sedang kami siapkan. Segera hadir untuk menampilkan Top Spender dan Buyer terbaik YASS Game Store!'
    ]);
})->name('leaderboard');

// Kalkulator Topup
Route::get('/kalkulator', function () {
    return view('kalkulator');
})->name('kalkulator');

// Yass Prestige (Under Development)
Route::get('/prestige', function () {
    return view('coming-soon', [
        'title' => 'YASS Prestige',
        'icon' => 'workspace_premium',
        'description' => 'Program VIP Member YASS Prestige sedang dalam tahap persiapan. Nantikan akses eksklusif dan diskon spesial untuk Anda!'
    ]);
})->name('prestige');

// Login & Register (Under Development)
Route::get('/login', function () {
    return view('coming-soon', [
        'title' => 'Masuk ke Akun',
        'icon' => 'login',
        'description' => 'Sistem autentikasi akun YASS sedang dalam tahap pengembangan. Segera hadir untuk memudahkan Anda melacak riwayat transaksi!'
    ]);
})->name('login');

Route::get('/register', function () {
    return view('coming-soon', [
        'title' => 'Buat Akun Baru',
        'icon' => 'person_add',
        'description' => 'Registrasi akun YASS sedang dalam tahap pengembangan. Dengan akun, Anda bisa menikmati program YASS Prestige dan riwayat transaksi!'
    ]);
})->name('register');

// Halaman Statis Footer
Route::get('/contact', function () {
    return view('coming-soon', [
        'title' => 'Hubungi Kami',
        'icon' => 'support_agent',
        'description' => 'Layanan bantuan sedang kami tingkatkan. Untuk sementara, Anda bisa menghubungi kami via media sosial.'
    ]);
})->name('contact');

Route::get('/terms', function () {
    return view('coming-soon', [
        'title' => 'Syarat & Ketentuan',
        'icon' => 'gavel',
        'description' => 'Halaman Syarat & Ketentuan sedang dalam proses penyusunan.'
    ]);
})->name('terms');

Route::get('/privacy', function () {
    return view('coming-soon', [
        'title' => 'Kebijakan Privasi',
        'icon' => 'shield',
        'description' => 'Halaman Kebijakan Privasi sedang dalam proses penyusunan.'
    ]);
})->name('privacy');

// Semua Games
Route::get('/games', function () {
    $games = [
        ['name' => 'Mobile Legends', 'publisher' => 'Moonton', 'slug' => 'mobile-legends', 'icon' => 'mlbb.png', 'tag' => 'HOT', 'tag_color' => 'red', 'description' => 'Diamond & Membership'],
        ['name' => 'Free Fire', 'publisher' => 'Garena', 'slug' => 'free-fire', 'icon' => 'free-fire.png', 'tag' => '', 'tag_color' => '', 'description' => 'Diamond & Membership'],
        ['name' => 'PUBG Mobile', 'publisher' => 'Level Infinite', 'slug' => 'pubg-mobile', 'icon' => 'pubg.png', 'tag' => 'SALE', 'tag_color' => 'blue', 'description' => 'Unknown Cash (UC)'],
        ['name' => 'Valorant', 'publisher' => 'Riot Games', 'slug' => 'valorant', 'icon' => 'valorant.png', 'tag' => '', 'tag_color' => '', 'description' => 'Valorant Points (VP)'],
        ['name' => 'Genshin Impact', 'publisher' => 'HoYoverse', 'slug' => 'genshin-impact', 'icon' => 'genshin.png', 'tag' => '', 'tag_color' => 'yellow', 'description' => 'Genesis Crystals'],
        ['name' => 'Honkai: Star Rail', 'publisher' => 'HoYoverse', 'slug' => 'honkai-star-rail', 'icon' => 'hsr.png', 'tag' => 'NEW', 'tag_color' => 'purple', 'description' => 'Oneiric Shards'],
    ];
    return view('games', compact('games'));
})->name('games');

