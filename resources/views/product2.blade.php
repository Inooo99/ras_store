@extends('layout2')

@section('title', 'Suntik Sosmed - RAS STORE')

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold text-light">Suntik Sosmed</h1>
    <p class="text-muted">Tingkatkan popularitas akunmu dengan followers aktif & real.</p>
</div>

<div class="container">
    <div class="row justify-content-center">

        <!-- Instagram -->
        <div class="col-md-5 mb-4">
            <div class="card bg-blue text-light shadow-lg border border-secondary h-100">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram Followers" class="card-img-top rounded-top" width="10" height="300">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-info">Instagram Followers</h4>
                    <p class="text-muted mb-2">Rp 15.000 / 1000 followers</p>
                    <p>Followers aktif dan real, meningkatkan kepercayaan audiens dan memperkuat branding akunmu.</p>
                    <a href="{{ url('/post') }}" class="btn btn-outline-info mt-2">← Kembali ke Produk</a>
                </div>
            </div>
        </div>

        <!-- Instagram -->
        <div class="col-md-5 mb-4">
            <div class="card bg-blue text-light shadow-lg border border-secondary h-100">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram Followers" class="card-img-top rounded-top" width="10" height="300">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-danger">Instagram Followers</h4>
                    <p class="text-muted mb-2">Rp 25.000 / 1500 followers</p>
                    <p>Followers aktif dan real, meningkatkan kepercayaan audiens dan memperkuat branding akunmu.</p>
                    <a href="{{ url('/post') }}" class="btn btn-outline-info mt-2">← Kembali ke Produk</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
