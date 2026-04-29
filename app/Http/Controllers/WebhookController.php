<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handleTripay(Request $request)
    {
        // 1. Validasi ini beneran dari Tripay atau bukan (Wajib!)
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, env('TRIPAY_PRIVATE_KEY'));

        if ($signature !== (string) $callbackSignature) {
            Log::error('Fake Webhook detected!');
            return response()->json(['success' => false, 'message' => 'Invalid signature'], 403);
        }

        $data = json_decode($json);
        $event = $request->header('HTTP_X_CALLBACK_EVENT');

        if ($event === 'payment_status') {
            // 2. Cari transaksi di database kita
            $transaction = Transaction::where('reference_id', $data->merchant_ref)->first();

            if (!$transaction) {
                return response()->json(['success' => false, 'message' => 'Transaction not found'], 404);
            }

            // 3. Update status kalau lunas
            if ($data->status === 'PAID' && $transaction->status === 'pending') {
                $transaction->update(['status' => 'processing']);
                
                // DI SINI TEMPAT KITA NEMBAK DIGIFLAZZ BUAT KIRIM DIAMOND!
                // Nanti kita panggil ProviderService->processTopup($transaction)
            } 
            // 4. Update status kalau kedaluwarsa
            elseif ($data->status === 'EXPIRED' || $data->status === 'FAILED') {
                $transaction->update(['status' => 'failed']);
            }

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Event not recognized'], 400);
    }
}