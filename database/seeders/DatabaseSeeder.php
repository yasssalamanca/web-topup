<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Categories (Games)
        $categories = [
            ['id' => 1, 'name' => 'Mobile Legends', 'slug' => 'mobile-legends', 'image' => 'assets/images/games/icons/mlbb.png'],
            ['id' => 2, 'name' => 'Free Fire', 'slug' => 'free-fire', 'image' => 'assets/images/games/icons/ff.png'],
            ['id' => 3, 'name' => 'PUBG Mobile', 'slug' => 'pubg-mobile', 'image' => 'assets/images/games/icons/pubg.png'],
            ['id' => 4, 'name' => 'Valorant', 'slug' => 'valorant', 'image' => 'assets/images/games/icons/valorant.png'],
            ['id' => 5, 'name' => 'Genshin Impact', 'slug' => 'genshin-impact', 'image' => 'assets/images/games/icons/genshin.png'],
            ['id' => 6, 'name' => 'Honkai: Star Rail', 'slug' => 'honkai-star-rail', 'image' => 'assets/images/games/icons/hsr.png'],
            ['id' => 7, 'name' => 'Google Play Voucher', 'slug' => 'google-play', 'image' => 'assets/images/games/icons/google-play.png'],
            ['id' => 8, 'name' => 'Pulsa & Data Telkomsel', 'slug' => 'pulsa-telkomsel', 'image' => 'assets/images/games/icons/telkomsel.png'],
        ];
        
        foreach ($categories as $cat) {
            DB::table('categories')->updateOrInsert(['id' => $cat['id']], $cat);
        }

        // 2. Seed Products
        $products = [
            // MLBB (Category 1)
            ['id' => 101, 'category_id' => 1, 'name' => 'Weekly Diamond Pass', 'price' => 28000, 'provider_price' => 25000, 'sku' => 'ML-WDP'],
            ['id' => 102, 'category_id' => 1, 'name' => 'Twilight Pass', 'price' => 135000, 'provider_price' => 130000, 'sku' => 'ML-TWILIGHT'],
            ['id' => 103, 'category_id' => 1, 'name' => '86 Diamonds', 'price' => 20000, 'provider_price' => 19000, 'sku' => 'ML-86'],
            // MLBB Joki (Category 1)
            ['id' => 999, 'category_id' => 1, 'name' => 'Joki Rank MLBB Custom', 'price' => 0, 'provider_price' => 0, 'sku' => 'ML-JOKI-CUSTOM'],
            // FF (Category 2)
            ['id' => 201, 'category_id' => 2, 'name' => '140 Diamonds', 'price' => 20000, 'provider_price' => 18000, 'sku' => 'FF-140'],
            // PUBG (Category 3)
            ['id' => 301, 'category_id' => 3, 'name' => '60 UC', 'price' => 14000, 'provider_price' => 13000, 'sku' => 'PUBG-60'],
            // Valorant (Category 4)
            ['id' => 401, 'category_id' => 4, 'name' => '125 VP', 'price' => 15000, 'provider_price' => 14000, 'sku' => 'VAL-125'],
            // Genshin (Category 5)
            ['id' => 501, 'category_id' => 5, 'name' => 'Blessing of the Welkin Moon', 'price' => 60000, 'provider_price' => 55000, 'sku' => 'GI-WELKIN'],
            // HSR (Category 6)
            ['id' => 601, 'category_id' => 6, 'name' => 'Express Supply Pass', 'price' => 60000, 'provider_price' => 55000, 'sku' => 'HSR-EXPRESS'],
            // Google Play Voucher (Category 7)
            ['id' => 701, 'category_id' => 7, 'name' => 'Voucher IDR 5.000', 'price' => 5500, 'provider_price' => 5000, 'sku' => 'GP-5'],
            ['id' => 702, 'category_id' => 7, 'name' => 'Voucher IDR 10.000', 'price' => 11000, 'provider_price' => 10000, 'sku' => 'GP-10'],
            ['id' => 703, 'category_id' => 7, 'name' => 'Voucher IDR 20.000', 'price' => 22000, 'provider_price' => 20000, 'sku' => 'GP-20'],
            ['id' => 704, 'category_id' => 7, 'name' => 'Voucher IDR 50.000', 'price' => 55000, 'provider_price' => 50000, 'sku' => 'GP-50'],
            ['id' => 705, 'category_id' => 7, 'name' => 'Voucher IDR 100.000', 'price' => 110000, 'provider_price' => 100000, 'sku' => 'GP-100'],
            ['id' => 706, 'category_id' => 7, 'name' => 'Voucher IDR 300.000', 'price' => 330000, 'provider_price' => 300000, 'sku' => 'GP-300'],
            ['id' => 707, 'category_id' => 7, 'name' => 'Voucher IDR 500.000', 'price' => 550000, 'provider_price' => 500000, 'sku' => 'GP-500'],
            // Pulsa & Data Telkomsel (Category 8)
            ['id' => 801, 'category_id' => 8, 'name' => 'Pulsa 5.000', 'price' => 5500, 'provider_price' => 5000, 'sku' => 'TSEL-5'],
            ['id' => 802, 'category_id' => 8, 'name' => 'Pulsa 10.000', 'price' => 10500, 'provider_price' => 10000, 'sku' => 'TSEL-10'],
            ['id' => 803, 'category_id' => 8, 'name' => 'Pulsa 20.000', 'price' => 20000, 'provider_price' => 19500, 'sku' => 'TSEL-20'],
            ['id' => 804, 'category_id' => 8, 'name' => 'Pulsa 50.000', 'price' => 49500, 'provider_price' => 49000, 'sku' => 'TSEL-50'],
            ['id' => 805, 'category_id' => 8, 'name' => 'Pulsa 100.000', 'price' => 99000, 'provider_price' => 98000, 'sku' => 'TSEL-100'],
            ['id' => 806, 'category_id' => 8, 'name' => 'Telkomsel Flash 1GB 7 Hari', 'price' => 15000, 'provider_price' => 14000, 'sku' => 'TSEL-DATA-1'],
            ['id' => 807, 'category_id' => 8, 'name' => 'Telkomsel Flash 3GB 30 Hari', 'price' => 32000, 'provider_price' => 30000, 'sku' => 'TSEL-DATA-3'],
            ['id' => 808, 'category_id' => 8, 'name' => 'Telkomsel Flash 10GB 30 Hari', 'price' => 85000, 'provider_price' => 80000, 'sku' => 'TSEL-DATA-10'],
        ];

        foreach ($products as $prod) {
            DB::table('products')->updateOrInsert(['id' => $prod['id']], $prod);
        }

        // 3. Seed Payment Methods
        $paymentMethods = [
            ['id' => 1, 'name' => 'QRIS', 'code' => 'QRIS', 'fee' => 0, 'fee_type' => 'flat'],
            ['id' => 2, 'name' => 'OVO', 'code' => 'OVO', 'fee' => 1000, 'fee_type' => 'flat'],
            ['id' => 3, 'name' => 'Bank BCA', 'code' => 'BCAVA', 'fee' => 4000, 'fee_type' => 'flat'],
            ['id' => 4, 'name' => 'Alfamart', 'code' => 'ALFAMART', 'fee' => 2500, 'fee_type' => 'flat'],
        ];

        foreach ($paymentMethods as $pm) {
            DB::table('payment_methods')->updateOrInsert(['id' => $pm['id']], $pm);
        }
    }
}
