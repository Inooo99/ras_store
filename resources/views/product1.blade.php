@extends('layout2')

@section('title', 'Aplikasi Premium - RAS STORE')

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold text-light">Aplikasi Premium</h1>
    <p class="text-muted">Langganan aplikasi premium tanpa batas, bebas iklan, dan offline.</p>
</div>

<div class="container">
    <div class="row justify-content-center">

        {{-- LOOPING DATA DARI DATABASE --}}
        @forelse($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-light shadow-lg border-secondary h-100">
                
                {{-- Logika Gambar --}}
                @if($product->image)
                    <img src="{{ asset('uploads/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 250px; object-fit: cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-secondary text-white" style="height: 250px;">
                        No Image
                    </div>
                @endif

                <div class="card-body text-center d-flex flex-column">
                    <h4 class="fw-bold text-warning">{{ $product->name }}</h4>
                    <p class="text-info fw-bold mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="small text-white-50 flex-grow-1">{{ $product->description }}</p>

                    {{-- Tombol Beli --}}
                    <a href="{{ url('/beli-premium/' . $product->id) }}" class="btn btn-warning mt-3 fw-bold text-dark w-100">
                        Beli Sekarang
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-white py-5">
            <h3>Belum ada produk aplikasi premium saat ini.</h3>
            <p>Silakan input data melalui Admin Panel.</p>
        </div>
        @endforelse

    </div>
</div>
@endsection