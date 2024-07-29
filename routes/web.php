<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\DataTables\UserDataTableController;
use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/datauser', [UserDataTableController::class, 'index'])->name('users-datatable');
Route::resource('jabatan', JabatanController::class);
Route::resource('jenissurat', JenissuratController::class);
Route::get('surat_keluar/laporan', [SuratKeluarController::class, 'laporan'])->name('surat_keluar.laporan');
Route::get('surat_keluar/export', [SuratKeluarController::class, 'exportExcel'])->name('surat_keluar.export');
Route::resource('surat_keluar', SuratKeluarController::class);
Route::get('surat_masuk/laporan', [SuratKeluarController::class, 'laporan'])->name('surat_masuk.laporan');
Route::get('surat_masuk/export', [SuratKeluarController::class, 'exportExcel'])->name('surat_masuk.export');
Route::resource('surat_masuk', SuratMasukController::class);
