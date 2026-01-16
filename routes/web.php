<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes - SUDAH DIRAPIKAN
|--------------------------------------------------------------------------
*/

// --- HALAMAN PUBLIC ---
Route::get('/', function () { return view('home'); })->name('home');
Route::get('/home', function () { return view('home'); });
Route::get('/about', function () { return view('about'); });
Route::get('/post', function () { return view('post'); });

// --- AUTHENTICATION (REGISTER & LOGIN) ---
// Perhatikan: Saya pakai name('register') di POST agar form blade tidak error
Route::get('/register', [UserController::class, 'showRegister'])->name('register.show');
Route::post('/register', [UserController::class, 'register'])->name('register'); 

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.perform');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// --- PEMBAYARAN ---
Route::get('/beli-premium/{id}', [CheckoutController::class, 'premium']);
Route::get('/beli-sosmed/{id}', [CheckoutController::class, 'sosmed']);
Route::get('/beli-game/{id}', [CheckoutController::class, 'game']);

// --- ADMIN PANEL ---
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin/products', ProductController::class)->names('products');
    Route::resource('admin/sosmed', SosmedController::class);
    Route::resource('admin/games', GameController::class);
});

// --- RESET DATABASE DARURAT ---
Route::get('/paksa-migrasi', function () {
    Artisan::call('optimize:clear');
    Artisan::call('migrate:fresh --force');
    Artisan::call('storage:link');
    return "<h1>SUKSES!</h1> Database sudah di-reset bersih.";
});