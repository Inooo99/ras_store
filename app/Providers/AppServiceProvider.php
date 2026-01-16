<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <--- KUNCI UTAMA 1

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
    public function boot(): void
    {
        // --- KUNCI UTAMA 2: PAKSA HTTPS DI RAILWAY ---
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}