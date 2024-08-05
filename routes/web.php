<?php

use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\MonitoringDisposisiController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DataTables\UserDataTableController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\UserProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Add this line
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\LandingPageController::class,'index'])->name('landing');

Route::group(['middleware' => ['web']], function() { 
    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::get('/datauser', [UserDataTableController::class, 'index'])->name('users-datatable');
    Route::resource('jenis_surat', JenisSuratController::class);
    Route::get('surat_keluar/laporan', [SuratKeluarController::class, 'laporan'])->name('surat_keluar.laporan');
    Route::get('surat_keluar/export', [SuratKeluarController::class, 'exportExcel'])->name('surat_keluar.export');
    Route::resource('surat_keluar', SuratKeluarController::class);
    Route::get('surat_masuk/laporan', [SuratMasukController::class, 'laporan'])->name('surat_masuk.laporan');
    Route::get('surat_masuk/export', [SuratMasukController::class, 'exportExcel'])->name('surat_masuk.export');
    Route::group(['middleware' => ['role:admin']], function() {
        Route::resource('jabatan', JabatanController::class);
        Route::resource('user', UserController::class);
        Route::resource('role', RoleController::class);
    });
    Route::resource('surat_masuk', SuratMasukController::class);
    Route::get('surat_masuk/{surat_masuk}/disposisi', [SuratMasukController::class, 'disposisi'])->name('surat_masuk.disposisi');
    Route::post('surat_masuk/{surat_masuk}/disposisi', [SuratMasukController::class, 'store_disposisi'])->name('surat_masuk.disposisi.store');
    Route::get('surat_masuk/{surat_masuk}/tolak', [SuratMasukController::class, 'tolak_surat'])->name('surat_masuk.tolak');
    Route::get('surat_masuk/{surat_masuk}/terima', [SuratMasukController::class, 'terima_surat'])->name('surat_masuk.terima');
    Route::get('surat_masuk/{surat_masuk}/distribusi', [SuratMasukController::class, 'distribusi'])->name('surat_masuk.distribusi');
    Route::post('surat_masuk/{surat_masuk}/distribusi', [SuratMasukController::class, 'store_distribusi'])->name('surat_masuk.distribusi.store');

    Route::resource('disposisi', DisposisiController::class);
    Route::get('disposisi/{disposisi}/teruskan', [DisposisiController::class, 'teruskan'])->name('disposisi.teruskan');
    Route::post('disposisi/{disposisi}/teruskan', [DisposisiController::class, 'store_teruskan'])->name('disposisi.teruskan.store');

    Route::get('monitoring_disposisi', [MonitoringDisposisiController::class, 'index'])->name('monitoring_disposisi.index');
    Route::post('monitoring_disposisi', [MonitoringDisposisiController::class, 'show'])->name('monitoring_disposisi.show');
    //get profile
    Route::get('profile', [UserProfileController::class, 'show'])->name('profile');
    // post profile.update
    Route::post('profile/update', [UserProfileController::class, 'update'])->name('profile.update');
    Route::get('/ganti-password', [UserController::class, 'gantiPassword'])->name('gantiPassword');
    Route::post('/ganti-password', [UserController::class, 'gantiPasswordSimpan'])->name('simpangantiPassword');
});
