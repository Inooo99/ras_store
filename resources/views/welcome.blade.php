@extends('layout2')

@section('title', 'Selamat Datang - RAS STORE')

@section('content')
<div class="text-center mt-5 fade-in">

    {{-- Hero Section --}}
    <h1 class="fw-bold display-4 text-dark mb-3 animate-title">Selamat Datang di 
        <span class="text-light bg-dark px-3 py-1 rounded">RAS STORE</span>
    </h1>
    <p class="text-muted fs-5 mb-4">
        Platform jualan produk digital untuk kebutuhan digital dan top-up aplikasi premium
    </p>
    
    {{-- Tombol Aksi --}}
    <a href="{{ url('/home') }}" class="btn btn-custom btn-lg px-4 py-2 shadow">🚀 Mulai Sekarang</a>

    {{-- Gambar Ilustrasi --}}
    <div class="mt-5">
        <img src="{{ asset('images/ras-store.png') }}" 
            alt="RAS STORE Banner" 
            class="img-fluid rounded shadow-lg border border-3 border-dark"
            style="max-width: 150px;">
    </div>

    {{-- Highlight Fitur --}}
    <div class="row mt-5 justify-content-center text-start">
        {{-- Pembayaran Aman --}}
        <div class="col-md-3 col-sm-6 mb-3">
            <a href="{{ url('/pembayaran') }}" class="text-decoration-none">
                <div class="card text-center p-3 bg-blue text-light border-0 shadow hover-card">
                    <div class="display-6 mb-2">💳</div>
                    <h5 class="fw-bold">Pembayaran Aman</h5>
                    <p class="text-muted small">
                        Transaksi dijamin aman dan cepat dengan berbagai metode pembayaran.
                    </p>
                </div>
            </a>
        </div>

        {{-- Open Source --}}
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center p-3 bg-blue text-light border-0 shadow hover-card">
                <div class="display-6 mb-2">⚙️</div>
                <h5 class="fw-bold">Open Source</h5>
                <p class="text-muted small">
                    Kode sumber terbuka dan dapat dikembangkan sesuai kebutuhan komunitas.
                </p>
            </div>
        </div>

        {{-- Produk Digital --}}
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center p-3 bg-blue text-light border-0 shadow hover-card">
                <div class="display-6 mb-2">🛍️</div>
                <h5 class="fw-bold">Produk Digital</h5>
                <p class="text-muted small">
                    Tersedia berbagai layanan premium, top-up game, dan aplikasi langganan.
                </p>
            </div>
        </div>
    </div>
</div>

{{-- Tambahan Animasi --}}
<style>
    .fade-in {
        animation: fadeIn 1.5s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-title {
        animation: popIn 1s ease-out;
    }
    @keyframes popIn {
        from { transform: scale(0.9); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }

    .hover-card {
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .hover-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
    }
</style>
@endsection
