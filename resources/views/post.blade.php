@extends('layout2')

@section('title', 'Produk - RAS STORE')

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold">Produk Terbaru</h1>
    <p class="text-muted">Informasi dan penawaran terbaru dari RAS STORE</p>
</div>

<div class="row text-center">
    
    {{-- TOMBOL APLIKASI PREMIUM --}}
    <div class="col-md-4 mb-4">
        <div class="card p-3 shadow-sm border-secondary bg-dark text-light">
            <h5 class="text-warning fw-bold">Aplikasi Premium</h5>
            <p class="text-white-50">Langganan aplikasi premium dengan tanpa batas, bebas iklan, dan offline mode.</p>
            {{-- Mengarah ke /kategori/aplikasi --}}
            <a href="{{ url('/kategori/aplikasi') }}" class="btn btn-warning fw-bold btn-sm">Cek Produk</a>
        </div>
    </div>

    {{-- TOMBOL SUNTIK SOSMED --}}
    <div class="col-md-4 mb-4">
        <div class="card p-3 shadow-sm border-secondary bg-dark text-light">
            <h5 class="text-warning fw-bold">Suntik Sosmed</h5>
            <p class="text-white-50">Tambahkan followers aktif & real untuk akun sosmed-mu.</p>
            {{-- Mengarah ke /kategori/sosmed --}}
            <a href="{{ url('/kategori/sosmed') }}" class="btn btn-warning fw-bold btn-sm">Cek Produk</a>
        </div>
    </div>

    {{-- TOMBOL TOP UP GAME --}}
    <div class="col-md-4 mb-4">
        <div class="card p-3 shadow-sm border-secondary bg-dark text-light">
            <h5 class="text-warning fw-bold">Top Up Game</h5>
            <p class="text-white-50">Top up game kalian dengan murah, cepat, dan terpercaya.</p>
            {{-- Mengarah ke /kategori/game --}}
            <a href="{{ url('/kategori/game') }}" class="btn btn-warning fw-bold btn-sm">Cek Produk</a>
        </div>
    </div>

</div>
@endsection