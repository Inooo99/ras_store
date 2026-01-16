@extends('layout2')

@section('title', 'Produk - RAS STORE')

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold">Produk Terbaru</h1>
    <p class="text-muted">Informasi dan penawaran terbaru dari RAS STORE</p>
</div>

<div class="row text-center">
    
    {{-- APLIKASI PREMIUM --}}
    <div class="col-md-4 mb-4">
        <div class="card p-3 bg-dark text-light border-secondary">
            <h5 class="text-warning fw-bold">Aplikasi Premium</h5>
            <p class="text-white-50">Langganan aplikasi premium bebas iklan.</p>
            {{-- ARAH KE KATEGORI APLIKASI --}}
            <a href="{{ url('/kategori/aplikasi') }}" class="btn btn-warning btn-sm fw-bold">Pilih Aplikasi</a>
        </div>
    </div>

    {{-- SUNTIK SOSMED --}}
    <div class="col-md-4 mb-4">
        <div class="card p-3 bg-dark text-light border-secondary">
            <h5 class="text-warning fw-bold">Suntik Sosmed</h5>
            <p class="text-white-50">Followers aktif & real untuk akunmu.</p>
            {{-- ARAH KE KATEGORI SOSMED --}}
            <a href="{{ url('/kategori/sosmed') }}" class="btn btn-warning btn-sm fw-bold">Pilih Layanan</a>
        </div>
    </div>

    {{-- TOP UP GAME --}}
    <div class="col-md-4 mb-4">
        <div class="card p-3 bg-dark text-light border-secondary">
            <h5 class="text-warning fw-bold">Top Up Game</h5>
            <p class="text-white-50">Top up game murah dan cepat.</p>
            {{-- ARAH KE KATEGORI GAME --}}
            <a href="{{ url('/kategori/game') }}" class="btn btn-warning btn-sm fw-bold">Pilih Game</a>
        </div>
    </div>

</div>
@endsection