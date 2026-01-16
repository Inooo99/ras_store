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
| Web Routes - Versi Bersih & Ringan
|--------------------------------------------------------------------------
*/

// --- PUBLIC ---
Route::get('/', function () { return view('home'); })->name('home');
Route::get('/home', function () { return view('home'); });
Route::get('/about', function () { return view('about'); });
Route::get('/post', function () { return view('post'); });

// --- AUTH (REGISTER & LOGIN) ---
// Perbaikan: Name diset jelas agar tidak error
Route::get('/register', [UserController::class, 'showRegister'])->name('register.show');
Route::post('/register', [UserController::class, 'register'])->name('register'); 

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.perform');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// --- TRANSAKSI ---
Route::get('/beli-premium/{id}', [CheckoutController::class, 'premium']);
Route::get('/beli-sosmed/{id}', [CheckoutController::class, 'sosmed']);
Route::get('/beli-game/{id}', [CheckoutController::class, 'game']);

// --- RUTE PRODUK UNTUK PENGUNJUNG (PUBLIC) ---

// 1. Aplikasi Premium (Produk)
Route::get('/produk/{id}', [ProductController::class, 'showPublic'])->name('product.detail');

// 2. Suntik Sosmed
Route::get('/sosmed/{id}', [SosmedController::class, 'showPublic'])->name('sosmed.detail');

// 3. Top Up Game
Route::get('/game/{id}', [GameController::class, 'showPublic'])->name('game.detail');

// 4. Fitur Pencarian (Opsional, saat ini pakai ProductController)
Route::get('/search', [ProductController::class, 'search'])->name('product.search');

// --- RUTE HALAMAN KATEGORI (LISTING) ---
Route::get('/kategori/aplikasi', [ProductController::class, 'indexPublic']);
Route::get('/kategori/sosmed', [SosmedController::class, 'indexPublic']);
Route::get('/kategori/game', [GameController::class, 'indexPublic']);

// --- ADMIN ---
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin/products', ProductController::class)->names('products');
    Route::resource('admin/sosmed', SosmedController::class);
    Route::resource('admin/games', GameController::class);
});

// --- OBAT RESET DATABASE ---
Route::get('/obat-ganteng', function () {
    Artisan::call('optimize:clear'); // Hapus cache yang nyangkut
    Artisan::call('migrate:fresh --force'); // Reset database
    Artisan::call('storage:link'); 
    return "<h1>SUKSES!</h1> Cache dibersihkan & Database di-reset.";
});

// --- RUTE HALAMAN KATEGORI (STEP 2) ---
Route::get('/kategori/aplikasi', [ProductController::class, 'indexPublic']);
Route::get('/kategori/sosmed', [SosmedController::class, 'indexPublic']);
Route::get('/kategori/game', [GameController::class, 'indexPublic']);