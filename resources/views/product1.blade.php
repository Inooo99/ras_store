@extends('layout2')

@section('title', 'Aplikasi Premium - RAS STORE')

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold text-light">Aplikasi Premium</h1>
    <p class="text-muted">Langganan aplikasi premium tanpa batas, bebas iklan, dan bisa offline.</p>
</div>

<div class="container">
    <div class="row justify-content-center">

        <!-- Spotify -->
        <div class="col-md-5 mb-4">
            <div class="card bg-blue text-light shadow-lg border border-secondary h-100">
                <img src="https://storage.googleapis.com/pr-newsroom-wp/1/2023/05/Spotify_Primary_Logo_RGB_Green.png" alt="Spotify Premium" class="card-img-top rounded-top" width="10" height="300">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-info">Spotify Premium</h4>
                    <p class="text-muted mb-2">Rp 25.000 / bulan</p>
                    <p>Dapatkan akses penuh ke semua fitur Spotify Premium dengan harga terjangkau. Dengarkan lagu favoritmu tanpa gangguan!</p>
                    <a href="{{ url('/post') }}" class="btn btn-outline-info mt-2">← Kembali ke Produk</a>
                </div>
            </div>
        </div>

        <!-- Netflix -->
        <div class="col-md-5 mb-4">
            <div class="card bg-blue text-light shadow-lg border border-secondary h-100">
                <img src="https://storage.googleapis.com/pr-newsroom-wp/1/2025/10/25_1014-Netflix-FTRHeader-1920x733.png" alt="Netflix Premium" class="card-img-top rounded-top" width="10" height="300">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-danger">Netflix Premium</h4>
                    <p class="text-muted mb-2">Rp 30.000 / bulan</p>
                    <p>Tonton semua film dan serial favoritmu tanpa batas dan tanpa iklan dengan Netflix Premium berkualitas tinggi!</p>
                    <a href="{{ url('/post') }}" class="btn btn-outline-info mt-2">← Kembali ke Produk</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
