<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show($game)
    {
        // Konfigurasi dinamis untuk setiap game
        $gameConfigs = [
            'mobile-legends' => [
                'name' => 'Mobile Legends',
                'publisher' => 'Moonton',
                'banner' => 'assets/images/games/banners/mlbb-banner.jpg',
                'icon' => 'assets/images/games/icons/mlbb.png',
                'has_zone_id' => true,
                'id_label' => 'User ID',
                'zone_label' => 'Zone ID',
                'id_placeholder' => 'Contoh: 12345678',
                'zone_placeholder' => 'Contoh: 1234',
                'info_text' => 'Untuk mengetahui User ID Anda, silakan klik menu profile dibagian kiri atas pada menu utama game.'
            ],
            'free-fire' => [
                'name' => 'Free Fire',
                'publisher' => 'Garena',
                'banner' => 'assets/images/games/banners/ff-banner.jpg', // User perlu menyiapkan gambar ini
                'icon' => 'assets/images/games/icons/free-fire.png',
                'has_zone_id' => false,
                'id_label' => 'Player ID',
                'id_placeholder' => 'Contoh: 1234567890',
                'info_text' => 'Untuk mengetahui Player ID Anda, silakan klik menu profile dibagian kiri atas pada menu utama game.'
            ],
            'pubg-mobile' => [
                'name' => 'PUBG Mobile',
                'publisher' => 'Tencent Games',
                'banner' => 'assets/images/games/banners/pubg-banner.jpg', // User perlu menyiapkan gambar ini
                'icon' => 'assets/images/games/icons/pubg.png',
                'has_zone_id' => false,
                'id_label' => 'Player ID',
                'id_placeholder' => 'Contoh: 5123456789',
                'info_text' => 'Untuk mengetahui Player ID Anda, silakan buka profil di dalam game.'
            ]
        ];

        if (!array_key_exists($game, $gameConfigs)) {
            abort(404);
        }

        $config = $gameConfigs[$game];

        // Data dummy produk (Nominal Topup)
        $products = [];
        if ($game === 'mobile-legends') {
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
        } else if ($game === 'free-fire') {
            $products = [
                'Membership' => [
                    ['id' => 201, 'name' => 'Weekly Membership', 'price' => 30000, 'icon' => 'card_membership', 'bonus' => 'Total 450 DM'],
                    ['id' => 202, 'name' => 'Monthly Membership', 'price' => 100000, 'icon' => 'stars', 'bonus' => 'Total 2600 DM'],
                ],
                'Diamonds' => [
                    ['id' => 11, 'name' => '5 Diamonds', 'price' => 1000, 'icon' => 'diamond', 'bonus' => ''],
                    ['id' => 12, 'name' => '50 Diamonds', 'price' => 8000, 'icon' => 'diamond', 'bonus' => '+5 Bonus'],
                    ['id' => 13, 'name' => '70 Diamonds', 'price' => 10000, 'icon' => 'diamond', 'bonus' => '+10 Bonus'],
                    ['id' => 14, 'name' => '140 Diamonds', 'price' => 20000, 'icon' => 'diamond', 'bonus' => '+20 Bonus'],
                    ['id' => 15, 'name' => '355 Diamonds', 'price' => 50000, 'icon' => 'diamond', 'bonus' => '+50 Bonus'],
                    ['id' => 16, 'name' => '720 Diamonds', 'price' => 100000, 'icon' => 'diamond', 'bonus' => '+100 Bonus'],
                    ['id' => 17, 'name' => '1450 Diamonds', 'price' => 200000, 'icon' => 'diamond', 'bonus' => '+200 Bonus'],
                ]
            ];
        } else if ($game === 'pubg-mobile') {
            $products = [
                'Unknown Cash' => [
                    ['id' => 301, 'name' => '60 UC', 'price' => 14000, 'icon' => 'monetization_on', 'bonus' => ''],
                    ['id' => 302, 'name' => '325 UC', 'price' => 70000, 'icon' => 'monetization_on', 'bonus' => '+25 Bonus'],
                    ['id' => 303, 'name' => '660 UC', 'price' => 140000, 'icon' => 'monetization_on', 'bonus' => '+60 Bonus'],
                    ['id' => 304, 'name' => '1800 UC', 'price' => 350000, 'icon' => 'monetization_on', 'bonus' => '+300 Bonus'],
                    ['id' => 305, 'name' => '3850 UC', 'price' => 700000, 'icon' => 'monetization_on', 'bonus' => '+850 Bonus'],
                    ['id' => 306, 'name' => '8100 UC', 'price' => 1400000, 'icon' => 'monetization_on', 'bonus' => '+2100 Bonus'],
                ]
            ];
        }

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

        return view('order', compact('game', 'config', 'products', 'paymentMethods'));
    }
}
