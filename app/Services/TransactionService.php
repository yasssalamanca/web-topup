<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Str;

class TransactionService
{
    // 1. Tambahin variable ini
    protected $paymentService;

    // 2. Inject PaymentService ke dalam constructor
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function createTransaction($userId, $productId, $targetId, $targetZone, $paymentMethodId, $customAmount = null)
    {
        $product = Product::findOrFail($productId);
        
        // Harga produk dasar, bisa dioverride oleh custom amount (khusus Joki)
        $productPrice = $customAmount !== null ? $customAmount : $product->price;

        // Asumsi fee admin. Nanti bisa ambil dari database tabel payment_methods
        $fee = 1500; 
        $totalAmount = $productPrice + $fee;

        $referenceId = 'INV-' . date('Ymd') . '-' . strtoupper(Str::random(6));

        // 3. Simpan transaksi awal (status: pending, payment_url: null)
        $transaction = Transaction::create([
            'reference_id' => $referenceId,
            'user_id' => $userId,
            'product_id' => $productId,
            'payment_method_id' => $paymentMethodId,
            'target_id' => $targetId,
            'target_zone' => $targetZone,
            'status' => 'pending',
            'amount' => $productPrice,
            'fee' => $fee,
            'total_amount' => $totalAmount,
        ]);

        // 4. INI BAGIAN AJAIBNYA: Langsung minta tagihan ke Tripay
        try {
            $paymentData = $this->paymentService->requestPayment($transaction);
            
            // Kita refresh data transaksi biar object $transaction-nya 
            // sekarang udah punya payment_url yang tadi diupdate sama PaymentService
            return $transaction->refresh();

        } catch (\Exception $e) {
            // Kalau gagal minta tagihan ke Tripay, mending transaksinya kita gagal-in sekalian
            $transaction->update(['status' => 'failed']);
            throw new \Exception("Gagal dapet link bayar: " . $e->getMessage());
        }
    }
}