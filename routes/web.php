<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\DataTables\UserDataTableController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/datauser', [UserDataTableController::class, 'index'])->name('users-datatable');
Route::resource('jabatan', JabatanController::class);
Route::resource('jenissurat', JenissuratController::class);
