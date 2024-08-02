<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    

    public function boot()
    {
        View::composer('layouts.partials._sidebar', function ($view) {
            $totalUser = User::all()->count();
            $view->with('totalUser', $totalUser);
        });
        View::composer('layouts.partials._header', function ($view) {

            $dataNotif = DB::table('notifications')
            ->select('notifications.*', 'sm.no_surat','sm.perihal','sm.asal_surat')
            ->join('surat_masuk as sm','sm.id','=','notifications.surat_masuk_id');
            // dd($dataNotif->get());
            $view->with([
                'data' => auth()->user()->id == 1 ? $dataNotif->get() : $dataNotif->where('notifications.surat_tujuan_id',auth()->user()->id)->get(),
                'countNotif' => $dataNotif->where('is_read', 0)->get()->count()
            ]);
        });
        // Direktif kustom untuk memformat tanggal
        Blade::directive('formatDate', function ($expression) {
            return "<?php 
                \$bulans = [
                    '01' => 'Januari',
                    '02' => 'Februari',
                    '03' => 'Maret',
                    '04' => 'April',
                    '05' => 'Mei',
                    '06' => 'Juni',
                    '07' => 'Juli',
                    '08' => 'Agustus',
                    '09' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Desember'
                ];
                echo date('d', strtotime($expression)) . ' ' . \$bulans[date('m', strtotime($expression))] . ' ' . date('Y', strtotime($expression)); 
            ?>";
        });

        // Direktif kustom untuk memformat tanggal dan waktu
        Blade::directive('formatDateTime', function ($expression) {
            return "<?php 
                \$bulans = [
                    '01' => 'Januari',
                    '02' => 'Februari',
                    '03' => 'Maret',
                    '04' => 'April',
                    '05' => 'Mei',
                    '06' => 'Juni',
                    '07' => 'Juli',
                    '08' => 'Agustus',
                    '09' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Desember'
                ];
                echo date('d', strtotime($expression)) . ' ' . \$bulans[date('m', strtotime($expression))] . ' ' . date('Y', strtotime($expression)) . ' ' . date('H:i', strtotime($expression)); 
            ?>";
        });
    }
}
