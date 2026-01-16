@extends('layout2')

@section('title', 'Aplikasi Premium - RAS STORE')

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold text-light">Aplikasi Premium</h1>
    <p class="text-muted">Langganan aplikasi premium tanpa batas, bebas iklan, dan offline.</p>
</div>

<div class="container">
    <div class="row justify-content-center">

        @forelse($products as $product)
        <div class="col-6 col-md-3 mb-4 px-2">
            <div class="card bg-dark text-light shadow-lg border-secondary h-100">
                
                @if($product->image)
                    <img src="{{ asset('uploads/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 130px; object-fit: cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-secondary text-white" style="height: 130px;">
                        No IMG
                    </div>
                @endif

                <div class="card-body text-center d-flex flex-column p-3">
                    <h6 class="fw-bold text-warning text-truncate">{{ $product->name }}</h6>
                    <p class="text-info fw-bold mb-2 small">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    
                    {{-- TOMBOL LANGSUNG BAYAR (BYPASS DETAIL) --}}
                    <a href="{{ url('/beli-premium/' . $product->id) }}" class="btn btn-warning btn-sm mt-auto fw-bold text-dark w-100">
                        Beli Sekarang
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-white py-5">
            <p>Belum ada produk.</p>
        </div>
        @endforelse

    </div>
</div>
@endsection