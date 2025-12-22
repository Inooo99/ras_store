@extends('layout2')

@section('title', 'Top Up Game - RAS STORE')

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold text-light">Top Up Game</h1>
    <p class="text-muted">Proses cepat, harga hemat, dan aman 100%.</p>
</div>

<div class="container">
    <div class="row justify-content-center">

        <!-- Mobile Legends -->
        <div class="col-md-5 mb-4">
            <div class="card bg-blue text-light shadow-lg border border-secondary h-100">
                <img src="https://buatlogoonline.com/wp-content/uploads/2022/10/Logo-Mobile-Legends-2048x1178.png" alt="Mobile Legends" class="card-img-top rounded-top" width="10" height="300">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-info">Mobile Legends</h4>
                    <p class="text-muted mb-2">Rp 10.000 / 86 Diamond</p>
                    <p>Top up diamond ML cepat dan terpercaya, cocok untuk push rank atau beli skin impianmu.</p>
                    <a href="{{ url('/post') }}" class="btn btn-outline-info mt-2">← Kembali ke Produk</a>
                </div>
            </div>
        </div>

        <!-- Mobile Legends -->
        <div class="col-md-5 mb-4">
            <div class="card bg-blue text-light shadow-lg border border-secondary h-100">
                <img src="https://buatlogoonline.com/wp-content/uploads/2022/10/Logo-Mobile-Legends-2048x1178.png" alt="Mobile Legends" class="card-img-top rounded-top" width="10" height="300">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-danger">Mobile Legends</h4>
                    <p class="text-muted mb-2">Rp 20.000 / 120 Diamond</p>
                    <p>Top up diamond ML cepat dan terpercaya, cocok untuk push rank atau beli skin impianmu.</p>
                    <a href="{{ url('/post') }}" class="btn btn-outline-info mt-2">← Kembali ke Produk</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
