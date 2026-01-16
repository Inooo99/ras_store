<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <--- JANGAN LUPA INI

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
        // MEMAKSA HTTPS DI RAILWAY (WAJIB AGAR TIDAK MENTAL)
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}