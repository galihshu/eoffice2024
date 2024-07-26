<?php

namespace App\Http\Controllers;
// get from model SuratMasuk, Jabatan
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\Disposisi;
use App\Models\User;

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
        $totalSuratMasukBaru = SuratMasuk::where('status_surat', '1')->count();
        $totalSuratMasukDiproses = SuratMasuk::where('status_surat', '2')->count();
        $totalSuratMasukSelesai = SuratMasuk::where('status_surat', '3')->count();
        $totalSuratKeluar = SuratKeluar::all()->count();
        $totalDisposisi = Disposisi::all()->count();
        $totalUser = User::all()->count();
        return view('modules.home.home', compact('totalSuratMasukBaru', 'totalSuratMasukDiproses', 'totalSuratMasukSelesai', 'totalSuratKeluar', 'totalDisposisi', 'totalUser'));
    }
}
