<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/register', [UserController::class, 'showRegister']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/post', function () {
    return view('post');
});

// Halaman produk terpisah
Route::get('/produk/1', function () {
    return view('product1');
});
Route::get('/produk/2', function () {
    return view('product2');
});
Route::get('/produk/3', function () {
    return view('product3');
});

Route::get('/pembayaran', function () {
    return view('pembayaran');
});

