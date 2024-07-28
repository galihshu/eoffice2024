<?php

namespace App\Http\Controllers;
// get from model SuratMasuk, Jabatan
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\Disposisi;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalSuratKeluar = SuratKeluar::all()->count();
        $totalDisposisi = Disposisi::all()->count();
        $totalUser = User::all()->count();
        
        // Mendapatkan tahun sekarang
        $currentYear = Carbon::now()->year;

        // Menghitung jumlah surat masuk per status per kuartal
        $suratMasukPerKuartal = $this->getSuratMasukPerQuarter($currentYear);
        $suratKeluarPerKuartal = $this->getSuratKeluarPerQuarter($currentYear);
        $disposisiPerKuartal = $this->getDisposisiPerQuarter($currentYear);

        // Menghitung jumlah surat masuk berdasarkan status
        $totalSuratMasukBaru = SuratMasuk::where('status_surat', '1')->count();
        $totalSuratMasukDiproses = SuratMasuk::where('status_surat', '2')->count();
        $totalSuratMasukSelesai = SuratMasuk::where('status_surat', '3')->count();

        return view('modules.home.home', compact(
        'totalSuratMasukBaru', 
        'totalSuratMasukDiproses', 
        'totalSuratMasukSelesai', 
        'totalSuratKeluar', 
        'totalDisposisi', 
        'totalUser',
        'suratMasukPerKuartal',
        'suratKeluarPerKuartal',
        'disposisiPerKuartal'));
    }

    private function getSuratMasukPerQuarter($year)
    {
        return SuratMasuk::selectRaw('QUARTER(tgl_surat) as quarter, COUNT(*) as total')
            ->whereYear('tgl_surat', $year)
            ->groupBy('quarter')
            ->orderBy('quarter')
            ->pluck('total', 'quarter')
            ->toArray();
    }

    private function getSuratKeluarPerQuarter($year)
    {
        return SuratKeluar::selectRaw('QUARTER(tgl_keluar) as quarter, COUNT(*) as total')
            ->whereYear('tgl_keluar', $year)
            ->groupBy('quarter')
            ->orderBy('quarter')
            ->pluck('total', 'quarter')
            ->toArray();
    }

    private function getDisposisiPerQuarter($year)
    {
        return Disposisi::selectRaw('QUARTER(created_at) as quarter, COUNT(*) as total')
            ->whereYear('created_at', $year)
            ->groupBy('quarter')
            ->orderBy('quarter')
            ->pluck('total', 'quarter')
            ->toArray();
    }
}
