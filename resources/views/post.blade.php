@extends('layout2')

@section('title', 'Produk - RAS STORE')

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold">Produk Terbaru</h1>
    <p class="text-muted">Informasi dan penawaran terbaru dari RAS STORE</p>
</div>

<div class="row text-center">
    <div class="col-md-4 mb-4">
        <div class="card p-3">
            <h5>Aplikasi Premium</h5>
            <p class="text-muted">Langganan aplikasi premium dengan tanpa batas, bebas iklan, dan offline mode.</p>
            <a href="{{ url('/produk/1') }}" class="btn btn-custom btn-sm">Cek Produk</a>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card p-3">
            <h5>Suntik Sosmed</h5>
            <p class="text-muted">Tambahkan followers aktif & real untuk akun sosmed-mu.</p>
            <a href="{{ url('/produk/2') }}" class="btn btn-custom btn-sm">Cek Produk</a>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card p-3">
            <h5>Top Up Game</h5>
            <p class="text-muted">Top up game kalian dengan murah, cepat, dan terpercaya.</p>
            <a href="{{ url('/produk/3') }}" class="btn btn-custom btn-sm">Cek Produk</a>
        </div>
    </div>
</div>
@endsection
