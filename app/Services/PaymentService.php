<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Transaction;

class PaymentService
{
    protected $apiKey;
    protected $privateKey;
    protected $merchantCode;
    protected $baseUrl;

    public function __construct()
    {
        // Ingat, tambahin ini nanti di .env lu!
        $this->apiKey = env('TRIPAY_API_KEY');
        $this->privateKey = env('TRIPAY_PRIVATE_KEY');
        $this->merchantCode = env('TRIPAY_MERCHANT_CODE');
        $this->baseUrl = env('TRIPAY_BASE_URL'); // Pake url sandbox buat testing
    }

    /**
     * Bikin signature keamanan buat Tripay
     */
    private function generateSignature($referenceId, $amount)
    {
        return hash_hmac('sha256', $this->merchantCode . $referenceId . $amount, $this->privateKey);
    }

    /**
     * Minta link pembayaran ke Tripay
     */
    public function requestPayment(Transaction $transaction)
    {
        $signature = $this->generateSignature($transaction->reference_id, $transaction->total_amount);

        // Nembak API Tripay
        $response = Http::withToken($this->apiKey)->post("{$this->baseUrl}/transaction/create", [
            'method'         => $transaction->paymentMethod->code, // misal: QRIS
            'merchant_ref'   => $transaction->reference_id,
            'amount'         => $transaction->total_amount,
            'customer_name'  => 'Customer ' . $transaction->target_id, // Default aja buat topup
            'customer_email' => 'buyer@domain.com', // Opsional
            'customer_phone' => '08123456789', // Opsional
            'order_items'    => [
                [
                    'sku'         => $transaction->product->sku,
                    'name'        => $transaction->product->name,
                    'price'       => $transaction->total_amount,
                    'quantity'    => 1
                ]
            ],
            'signature'      => $signature
        ]);

        if (!$response->successful()) {
            throw new \Exception("Gagal bikin pembayaran: " . $response->body());
        }

        $data = $response->json('data');

        // Simpan URL pembayaran dari Tripay ke database kita
        $transaction->update([
            'payment_url' => $data['checkout_url'] // Atau qr_url kalau pake QRIS
        ]);

        return $data;
    }
}