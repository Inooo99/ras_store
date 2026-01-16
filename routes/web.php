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
Route::get('/register', [UserController::class, 'showRegister']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

// --- HALAMAN PUBLIC ---
Route::get('/', function () { return view('welcome'); });
Route::get('/home', function () { return view('home'); });
Route::get('/about', function () { return view('about'); });
Route::get('/post', function () { return view('post'); });

// --- RUTE PRODUK DINAMIS (USER VIEW) ---

// 1. Halaman Aplikasi Premium
Route::get('/produk/1', function () {
    $products = Product::all(); // Ambil dari database
    return view('product1', compact('products'));
});

// 2. Halaman Suntik Sosmed
Route::get('/produk/2', function () {
    $sosmeds = Sosmed::all(); // Ambil dari database
    return view('product2', compact('sosmeds'));
});

// 3. Halaman Topup Game
Route::get('/produk/3', function () {
    $games = Game::all(); // Ambil dari database
    return view('product3', compact('games'));
});

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