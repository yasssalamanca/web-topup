<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;

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

    /**
     * Fungsi buat order/topup ke Digiflazz
     */
    public function placeOrder(Transaction $transaction)
    {
        // 1. Gabungin target_id (ID Player) dan target_zone (Server ID)
        // Kalau ML kan formatnya IDPlayerServerID, contoh: 123456781234
        $customerNo = $transaction->target_id;
        if ($transaction->target_zone) {
            $customerNo .= $transaction->target_zone;
        }

        // 2. Bikin signature untuk transaksi (Beda sama signature pricelist)
        // Rumus Digiflazz buat transaksi: md5(username + api_key + ref_id)
        $signature = $this->generateSign($transaction->reference_id);

        // 3. Tembak API Digiflazz buat order
        $response = Http::post("{$this->baseUrl}/transaction", [
            'username' => $this->username,
            'buyer_sku_code' => $transaction->product->sku,
            'customer_no' => $customerNo,
            'ref_id' => $transaction->reference_id,
            'sign' => $signature,
            // 'testing' => true // BUKA KOMEN INI KALAU LAGI PAKE MODE SANDBOX/TESTING
        ]);

        $data = $response->json('data');

        if ($response->successful() && isset($data['status'])) {
            // Kalau dari Digiflazz statusnya Sukses atau Pending (karena kadang butuh waktu proses)
            if ($data['status'] === 'Sukses' || $data['status'] === 'Pending') {
                $transaction->update([
                    'provider_reference' => $data['sn'] ?? null, // SN (Serial Number) / Bukti topup
                    // Kita set 'processing' aja dulu. Nanti kalau ada webhook dari Digiflazz baru kita set 'success'
                    'status' => 'processing'
                ]);
                return true;
            }
        }

        // Kalau saldonya lu habis, atau server Digiflazz error
        $transaction->update(['status' => 'failed']);
        Log::error('Gagal Topup Digiflazz: ' . $response->body());
        return false;
    }
}