<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function checkNickname(Request $request)
    {
        $game = $request->input('game');
        $targetId = $request->input('target_id');
        $targetZone = $request->input('target_zone');

        // Validasi input dasar
        if (!$targetId) {
            return response()->json([
                'success' => false,
                'message' => 'Target ID diperlukan'
            ], 400);
        }

        if ($game === 'mobile-legends' && !$targetZone) {
            return response()->json([
                'success' => false,
                'message' => 'Zone ID diperlukan untuk Mobile Legends'
            ], 400);
        }

        // Simulasi delay jaringan API asli (1 detik)
        sleep(1);

        // Simulasi logika mencari nama berdasarkan ID
        // Kita gunakan seed dari ID agar namanya konsisten jika diketik ulang
        $seed = (int) preg_replace('/[^0-9]/', '', $targetId);
        if ($seed === 0) $seed = rand(1000, 9999);
        
        $adjectives = ['Pro', 'Noob', 'King', 'Lord', 'Dark', 'Light', 'Yass', 'Gamer', 'Elite', 'Mvp'];
        $nouns = ['Slayer', 'Hunter', 'Sniper', 'Mage', 'Fighter', 'Tank', 'Carry', 'Support', 'Player', 'Bot'];
        
        // Pilih nama acak namun deterministik berdasarkan ID
        $adj = $adjectives[$seed % count($adjectives)];
        $noun = $nouns[($seed / 10) % count($nouns)];
        
        $nickname = "{$adj}_{$noun}" . ($seed % 100);

        // Simulasi kemungkinan ID tidak ditemukan (misal jika ID cuma 1 angka)
        if (strlen($targetId) < 4) {
            return response()->json([
                'success' => false,
                'message' => 'ID tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'nickname' => $nickname
        ]);
    }
}
