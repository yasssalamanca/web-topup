<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Str;

class TransactionService
{
    /**
     * Fungsi utama buat bikin transaksi baru
     */
    public function createTransaction($userId, $productId, $targetId, $targetZone, $paymentMethodId)
    {
        // 1. Ambil data produk (Biar dapet harga aslinya, jangan percaya harga dari Front-End!)
        $product = Product::findOrFail($productId);

        // 2. Kalkulasi Biaya (Anggap aja fee admin flat Rp 1.500)
        $fee = 1500;
        $totalAmount = $product->price + $fee;

        // 3. Bikin Invoice/Reference ID yang keren (Contoh: INV-20260429-A8F9B2)
        $referenceId = 'INV-' . date('Ymd') . '-' . strtoupper(Str::random(6));

        // 4. Eksekusi simpan ke Database
        $transaction = Transaction::create([
            'reference_id' => $referenceId,
            'user_id' => $userId, // Bisa null kalau guest checkout
            'product_id' => $productId,
            'payment_method_id' => $paymentMethodId,
            'target_id' => $targetId,
            'target_zone' => $targetZone,
            'status' => 'pending',
            'amount' => $product->price,
            'fee' => $fee,
            'total_amount' => $totalAmount,
        ]);

        // Nanti di sini kita bisa tambahin logika buat manggil API Provider Top-up

        return $transaction;
    }
}
