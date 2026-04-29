<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show($game)
    {
        // Untuk sekarang kita buat hardcoded untuk mobile-legends
        // Kedepannya ini bisa dicari dari database Game::where('slug', $game)->firstOrFail();
        
        if ($game !== 'mobile-legends') {
            abort(404);
        }

        // Data dummy produk (Nominal Topup)
        $products = [
            'Membership' => [
                ['id' => 101, 'name' => 'Weekly Diamond Pass', 'price' => 28000, 'icon' => 'card_membership', 'bonus' => 'Total 220 DM'],
                ['id' => 102, 'name' => 'Twilight Pass', 'price' => 135000, 'icon' => 'stars', 'bonus' => 'Exclusive Skin'],
                ['id' => 103, 'name' => 'Starlight Member', 'price' => 140000, 'icon' => 'star', 'bonus' => 'Premium Rewards'],
                ['id' => 104, 'name' => 'Starlight Member Plus', 'price' => 300000, 'icon' => 'military_tech', 'bonus' => 'Extra Levels'],
            ],
            'Diamonds' => [
                ['id' => 1, 'name' => '5 Diamonds', 'price' => 1500, 'icon' => 'diamond', 'bonus' => '+0 Bonus'],
                ['id' => 2, 'name' => '12 Diamonds', 'price' => 3500, 'icon' => 'diamond', 'bonus' => '+1 Bonus'],
                ['id' => 3, 'name' => '50 Diamonds', 'price' => 14500, 'icon' => 'diamond', 'bonus' => '+5 Bonus'],
                ['id' => 4, 'name' => '70 Diamonds', 'price' => 20000, 'icon' => 'diamond', 'bonus' => '+7 Bonus'],
                ['id' => 5, 'name' => '140 Diamonds', 'price' => 40000, 'icon' => 'diamond', 'bonus' => '+14 Bonus'],
                ['id' => 6, 'name' => '284 Diamonds', 'price' => 80000, 'icon' => 'diamond', 'bonus' => '+28 Bonus'],
                ['id' => 7, 'name' => '429 Diamonds', 'price' => 120000, 'icon' => 'diamond', 'bonus' => '+42 Bonus'],
                ['id' => 8, 'name' => '706 Diamonds', 'price' => 200000, 'icon' => 'diamond', 'bonus' => '+70 Bonus'],
                ['id' => 9, 'name' => '1084 Diamonds', 'price' => 300000, 'icon' => 'diamond', 'bonus' => '+108 Bonus'],
                ['id' => 10, 'name' => '1446 Diamonds', 'price' => 400000, 'icon' => 'diamond', 'bonus' => '+144 Bonus'],
            ]
        ];

        // Data dummy metode pembayaran
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

        return view('order', compact('game', 'products', 'paymentMethods'));
    }
}
