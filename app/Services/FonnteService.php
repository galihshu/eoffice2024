<?php 

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FonnteService
{
    protected $deviceToken;

    public function __construct()
    {
        $this->deviceToken = env('FONNTE_DEVICE_TOKEN');; // Atau ambil dari .env
    }

    public function sendMessage($phone, $message)
    {
        // Cek apakah token sudah diinisialisasi dengan benar
        // Log::info('Menggunakan device token:', ['token' => $this->deviceToken]);
    
        $response = Http::withHeaders([
            'Authorization' => $this->deviceToken,
        ])->post('https://api.fonnte.com/send', [
            'target' => $phone,
            'message' => $message,
            'countryCode' => '62', // Sesuaikan dengan kode negara
        ]);
    
        // Log::info('Respon dari API Fonnte:', $response->json());

        if ($response->successful()) {
            return true;
        } else {
            // Tambahkan logging untuk error handling
            Log::error('Pengiriman pesan gagal:', ['response' => $response->json()]);
            return false;
        }
    }
}
