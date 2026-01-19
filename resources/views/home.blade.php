@extends('layout2')

@section('title', 'Home - RAS STORE')

@section('content')
<div class="text-center">
    <h1 class="fw-bold mb-3">Selamat Datang di RAS STORE</h1>
    <p class="text-muted">Websiteeeeeeeeee Jualan Open Source untuk Menjual Produk Digital</p>
    <a href="{{ url('/post') }}" class="btn btn-custom mt-3">Lihat Postingan</a>
</div>

<div class="row mt-5">
    <div class="col-md-4">
        <div class="card p-3">
            <h5>Kolaborasi</h5>
            <p>Membangun Strategi Bisnis Bersama Dengan Cara Yang Ilegal.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-3">
            <h5>Manajemen</h5>
            <p>Mengelola Customer,Aktivitas dan Pembelian.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-3">
            <h5>Open Source</h5>
            <p>RAS STORE dibangun untuk mempermudah seseorang untuk membeli produk digital.</p>
        </div>
    </div>
</div>
@endsection
