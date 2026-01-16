<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <--- TAMBAHKAN INI (1)

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // --- TAMBAHKAN KODE INI (2) ---
        // Jika sedang di Production (Railway), paksa gunakan HTTPS
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}