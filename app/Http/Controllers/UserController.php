<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    // Tampilkan form register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses register pengguna baru
    public function register(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed'
        ]);

        // 2. Buat User Baru
        // (Pastikan model User diimport: use App\Models\User;)
        \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user' // Default role user biasa
        ]);

        // --- PERUBAHAN DI SINI ---
        
        // DULU: Auth::login($user); (Ini yang bikin langsung masuk)
        // SEKARANG: Kita hapus baris login otomatis itu.

        // Alihkan ke halaman login dengan pesan sukses
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Tampilkan form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/home')->with('success', 'Berhasil login!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah!'
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout!');
    }
}