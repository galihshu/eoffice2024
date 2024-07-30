<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;

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
    }
}
