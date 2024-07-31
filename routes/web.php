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
    Route::resource('jabatan', JabatanController::class);
    Route::resource('jenissurat', JenisSuratController::class);
    Route::get('surat_keluar/laporan', [SuratKeluarController::class, 'laporan'])->name('surat_keluar.laporan');
    Route::get('surat_keluar/export', [SuratKeluarController::class, 'exportExcel'])->name('surat_keluar.export');
    Route::resource('surat_keluar', SuratKeluarController::class);
    Route::get('surat_masuk/laporan', [SuratKeluarController::class, 'laporan'])->name('surat_masuk.laporan');
    Route::get('surat_masuk/export', [SuratKeluarController::class, 'exportExcel'])->name('surat_masuk.export');
    Route::group(['middleware' => ['role:admin']], function() {
        Route::resource('user', UserController::class);
        Route::resource('role', RoleController::class);
    });
    Route::resource('surat_masuk', SuratMasukController::class);
    Route::get('surat_masuk/{surat_masuk}/disposisi', [SuratMasukController::class, 'disposisi'])->name('surat_masuk.disposisi');
    Route::post('surat_masuk/{surat_masuk}/disposisi', [SuratMasukController::class, 'store_disposisi'])->name('surat_masuk.disposisi.store');
    Route::resource('disposisi', DisposisiController::class);

    Route::get('monitoring_disposisi', [MonitoringDisposisiController::class, 'index'])->name('monitoring_disposisi.index');
    Route::post('monitoring_disposisi', [MonitoringDisposisiController::class, 'show'])->name('monitoring_disposisi.show');
    //get profile
    Route::get('profile', [UserProfileController::class, 'show'])->name('profile');
    // post profile.update
    Route::post('profile/update', [UserProfileController::class, 'update'])->name('profile.update');
});
