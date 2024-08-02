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
        $totalSuratMasukDidisposisi = SuratMasuk::where('status_surat', '3')->count();
        $totalSuratMasukSelesai = SuratMasuk::where('status_surat', '4')->count();
        $totalSuratMasukDitolak = SuratMasuk::where('status_surat', '5')->count();

        // Hitung total semua surat masuk
        $totalSuratMasuk = $totalSuratMasukBaru + $totalSuratMasukDiproses + $totalSuratMasukDidisposisi + $totalSuratMasukSelesai;

        // Hitung persentase masing-masing status
        $persentaseBaru = ($totalSuratMasukBaru / $totalSuratMasuk) * 100;
        $persentaseDiproses = ($totalSuratMasukDiproses / $totalSuratMasuk) * 100;
        $persentaseDidisposisi = ($totalSuratMasukDidisposisi / $totalSuratMasuk) * 100;
        $persentaseSelesai = ($totalSuratMasukSelesai / $totalSuratMasuk) * 100;

        return view('modules.home.home', compact(
        'totalSuratMasukBaru', 
        'totalSuratMasukDiproses', 
        'totalSuratMasukDidisposisi', 
        'totalSuratMasukSelesai',
        'persentaseBaru',
        'persentaseDiproses',
        'persentaseDidisposisi',
        'persentaseSelesai', 
        'totalSuratMasukDitolak',
        'totalSuratKeluar', 
        'totalDisposisi', 
        'totalUser',
        'suratMasukPerKuartal',
        'suratKeluarPerKuartal',
        'disposisiPerKuartal'));
    }

    private function getSuratMasukPerQuarter($year)
    {
        return SuratMasuk::selectRaw('QUARTER(tgl_masuk) as quarter, COUNT(*) as total')
            ->whereYear('tgl_masuk', $year)
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
        return SuratMasuk::selectRaw('QUARTER(tgl_masuk) as quarter, COUNT(*) as total')
            ->whereYear('tgl_masuk', $year)
            ->where('status_surat', 3)
            ->groupBy('quarter')
            ->orderBy('quarter')
            ->pluck('total', 'quarter')
            ->toArray();
    }
}
