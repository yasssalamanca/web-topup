<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Services\ProviderService; // Tambahin ini
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    protected $providerService;

    // Inject ProviderService
    public function __construct(ProviderService $providerService)
    {
        $this->providerService = $providerService;
    }

    public function handleTripay(Request $request)
    {
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
            $transaction = Transaction::where('reference_id', $data->merchant_ref)->first();

            if (!$transaction) {
                return response()->json(['success' => false, 'message' => 'Transaction not found'], 404);
            }

            // BAGIAN PALING EPIC DI SINI
            if ($data->status === 'PAID' && $transaction->status === 'pending') {
                // 1. Ubah status transaksi jadi processing
                $transaction->update(['status' => 'processing']);
                
                // 2. Langsung tembak Digiflazz buat ngisi diamondnya!
                $this->providerService->placeOrder($transaction);
            } 
            elseif ($data->status === 'EXPIRED' || $data->status === 'FAILED') {
                $transaction->update(['status' => 'failed']);
            }

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Event not recognized'], 400);
    }
}