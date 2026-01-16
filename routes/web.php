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
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// --- TRANSAKSI ---
Route::get('/beli-premium/{id}', [CheckoutController::class, 'premium']);
Route::get('/beli-sosmed/{id}', [CheckoutController::class, 'sosmed']);
Route::get('/beli-game/{id}', [CheckoutController::class, 'game']);

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