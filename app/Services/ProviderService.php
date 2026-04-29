<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Category;
use App\Models\Product;

class ProviderService
{
    protected $username;
    protected $key;
    protected $baseUrl;

    public function __construct()
    {
        $this->username = env('DIGIFLAZZ_USERNAME');
        $this->key = env('DIGIFLAZZ_KEY');
        $this->baseUrl = env('DIGIFLAZZ_BASE_URL');
    }

    /**
     * Bikin signature rahasia (Syarat keamanan Digiflazz)
     */
    private function generateSign($command)
    {
        return md5($this->username . $this->key . $command);
    }

    /**
     * Fungsi buat narik ratusan produk dan masukin ke Database otomatis
     */
    public function syncProducts()
    {
        // Nembak API Digiflazz
        $response = Http::post("{$this->baseUrl}/price-list", [
            'cmd' => 'prepaid',
            'username' => $this->username,
            'sign' => $this->generateSign('pricelist')
        ]);

        if (!$response->successful()) {
            throw new \Exception("Gagal konek ke provider pusat bro!");
        }

        $products = $response->json('data');

        // Looping ratusan produk dari pusat
        foreach ($products as $item) {
            // Kita filter cuma ambil kategori Games aja
            if ($item['category'] == 'Games') {
                
                // 1. Simpan Kategori Game-nya (Cari, kalau nggak ada ya dibikin)
                $category = Category::firstOrCreate(
                    ['slug' => strtolower(str_replace(' ', '-', $item['brand']))],
                    ['name' => $item['brand'], 'is_active' => true]
                );

                // 2. Simpan atau Update Produknya (Ajaibnya Laravel: updateOrCreate)
                Product::updateOrCreate(
                    ['sku' => $item['buyer_sku_code']], // Cek pake SKU
                    [
                        'category_id' => $category->id,
                        'name' => $item['product_name'],
                        'provider_price' => $item['price'],
                        // Logika cuan lu: Harga modal + Rp 2000
                        'price' => $item['price'] + 2000, 
                        'is_available' => $item['buyer_product_status'] && $item['seller_product_status']
                    ]
                );
            }
        }

        return true;
    }
}