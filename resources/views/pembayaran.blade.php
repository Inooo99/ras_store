@extends('layout2')

@section('title', 'Metode Pembayaran - RAS STORE')

@section('content')
<div class="text-center mt-5">
    <h1 class="fw-bold text-dark">Metode Pembayaran</h1>
    <p class="text-muted mb-4">Pilih metode pembayaran yang tersedia di RAS STORE</p>

    <div class="row justify-content-center">
        <div class="col-md-4 mb-3">
            <div class="card bg-blue text-light shadow-lg border-0">
                <div class="card-body">
                    <h4 class="fw-bold">💰 Transfer Bank</h4>
                    <p class="text-muted">Tersedia BCA, BNI, Mandiri, dan BRI.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card bg-blue text-light shadow-lg border-0">
                <div class="card-body">
                    <h4 class="fw-bold">📱 E-Wallet</h4>
                    <p class="text-muted">Dukung OVO, DANA, GoPay, ShopeePay, dan LinkAja.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card bg-blue text-light shadow-lg border-0">
                <div class="card-body">
                    <h4 class="fw-bold">💳 Kartu Kredit/Debit</h4>
                    <p class="text-muted">Visa, Mastercard, dan JCB diterima.</p>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ url('/') }}" class="btn btn-custom mt-4">← Kembali</a>
</div>
@endsection
