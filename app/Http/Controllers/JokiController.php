<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JokiController extends Controller
{
    public function show($game)
    {
        if ($game !== 'mlbb') {
            abort(404);
        }

        // Data Paket Joki
        $packages = [
            ['id' => 1, 'name' => 'Mythic Grading (18 Bintang)', 'price' => 180000, 'icon' => 'military_tech'],
            ['id' => 2, 'name' => '10 Star Epic', 'price' => 60000, 'icon' => 'stars'],
            ['id' => 3, 'name' => '10 Star Legends', 'price' => 70000, 'icon' => 'stars'],
            ['id' => 4, 'name' => '10 Star Mythic Romawi', 'price' => 110000, 'icon' => 'stars'],
            ['id' => 5, 'name' => '10 Star Mythic Honor', 'price' => 125000, 'icon' => 'stars'],
            ['id' => 6, 'name' => '10 Star Mythic Glory', 'price' => 150000, 'icon' => 'stars'],
            ['id' => 7, 'name' => '10 Star Mythic Immortal', 'price' => 180000, 'icon' => 'stars'],
        ];

        // Data dummy metode pembayaran (reused from OrderController)
        $paymentMethods = [
            'E-Wallet' => [
                ['id' => 1, 'name' => 'QRIS', 'fee' => 0, 'logo' => 'qr_code_2'],
                ['id' => 2, 'name' => 'DANA', 'fee' => 1000, 'logo' => 'account_balance_wallet'],
                ['id' => 3, 'name' => 'OVO', 'fee' => 1500, 'logo' => 'account_balance_wallet'],
                ['id' => 4, 'name' => 'ShopeePay', 'fee' => 1500, 'logo' => 'account_balance_wallet'],
            ],
            'Virtual Account' => [
                ['id' => 5, 'name' => 'BCA Virtual Account', 'fee' => 4000, 'logo' => 'account_balance'],
                ['id' => 6, 'name' => 'Mandiri Virtual Account', 'fee' => 4000, 'logo' => 'account_balance'],
                ['id' => 7, 'name' => 'BRI Virtual Account', 'fee' => 4000, 'logo' => 'account_balance'],
            ],
            'Convenience Store' => [
                ['id' => 8, 'name' => 'Alfamart', 'fee' => 2500, 'logo' => 'store'],
                ['id' => 9, 'name' => 'Indomaret', 'fee' => 2500, 'logo' => 'store'],
            ]
        ];

        return view('joki', compact('game', 'packages', 'paymentMethods'));
    }
}
