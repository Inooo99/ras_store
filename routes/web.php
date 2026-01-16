<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CheckoutController;
use App\Models\Product;
use App\Models\Sosmed;
use App\Models\Game;
use Illuminate\Support\Facades\Artisan;

// --- HALAMAN AUTH ---
Route::get('/register', [UserController::class, 'showRegister'])->name('register.show');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

// --- HALAMAN PUBLIC ---
Route::get('/', function () { return view('welcome'); });
Route::get('/home', function () { return view('home'); });
Route::get('/about', function () { return view('about'); });
Route::get('/post', function () { return view('post'); });

// --- RUTE PRODUK DINAMIS (USER VIEW) ---

// Halaman Utama
Route::get('/', function () {
    return view('home'); // Sesuaikan dengan view home Anda
})->name('home');

// === BAGIAN REGISTER (PERBAIKAN DISINI) ===
// 1. Tampilkan Form
Route::get('/register', [UserController::class, 'showRegister'])->name('register.form');

// 2. Proses Data (INI YANG DICARI OLEH FORM BLADE)
Route::post('/register', [UserController::class, 'register'])->name('register'); 
// ^^^ Perhatikan ->name('register') ini wajib ada!

// === BAGIAN LOGIN ===
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.perform');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// --- RUTE PEMBAYARAN MIDTRANS ---
Route::get('/beli-premium/{id}', [CheckoutController::class, 'premium']);
Route::get('/beli-sosmed/{id}', [CheckoutController::class, 'sosmed']);
Route::get('/beli-game/{id}', [CheckoutController::class, 'game']);

// --- HALAMAN ADMIN (DILINDUNGI) ---
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin/products', ProductController::class)->names('products');
    Route::resource('admin/sosmed', SosmedController::class);
    Route::resource('admin/games', GameController::class);
});

// --- TOMBOL RAHASIA UNTUK MIGRASI ---
Route::get('/paksa-migrasi', function () {
    // 1. Bersihkan Cache
    Artisan::call('optimize:clear');
    
    // 2. Paksa Migrasi Database
    Artisan::call('migrate:fresh --force');
    
    // 3. Buat Storage Link
    Artisan::call('storage:link');

    return "<h1>SUKSES! Database sudah di-reset dan di-migrasi.</h1><br>" . nl2br(Artisan::output());
});