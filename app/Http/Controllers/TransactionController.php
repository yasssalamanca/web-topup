<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TransactionService;

class TransactionController extends Controller
{
    protected $transactionService;

    // Ini namanya Dependency Injection, nge-load Service secara otomatis
    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function store(Request $request)
    {
        // 1. Satpam ngecek inputan (Validasi)
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'target_id' => 'required',
            'payment_method_id' => 'required|exists:payment_methods,id'
        ]);

        try {
            // 2. Lempar kerjaan berat ke Service
            $transaction = $this->transactionService->createTransaction(
                auth()->id(), // ID user yang lagi login (kalau ada)
                $request->product_id,
                $request->target_id,
                $request->target_zone,
                $request->payment_method_id
            );

            // 3. Kasih jawaban ke Front-End
            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil dibuat! Silakan lakukan pembayaran.',
                'data' => $transaction
            ], 201);

        } catch (\Exception $e) {
            // Kalau ada error (misal database mati), tangkep di sini
            return response()->json([
                'success' => false,
                'message' => 'Gagal bikin transaksi: ' . $e->getMessage()
            ], 500);
        }
    }
}
