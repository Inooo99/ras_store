<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek: Apakah dia login? DAN Apakah role-nya 'admin'?
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request); // Silakan masuk bos
        }

        // Kalau bukan admin, tendang ke halaman home atau error
        return redirect('/')->with('error', 'Anda tidak punya akses admin!');
    }
}