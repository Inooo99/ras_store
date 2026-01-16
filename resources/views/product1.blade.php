@extends('layout2')

@section('title', 'Aplikasi Premium - RAS STORE')

@section('content')
<div class="text-center mb-4">
    <h2 class="fw-bold text-light">Aplikasi Premium</h2>
    <p class="text-muted small">Hemat, Bebas Iklan & Offline.</p>
</div>

<div class="container">
    <div class="row">

        {{-- LOOPING DATA --}}
        @forelse($products as $product)
        {{-- COL-6 (HP: 2 Baris), COL-MD-3 (Laptop: 4 Baris) --}}
        <div class="col-6 col-md-3 mb-3 px-2">
            <div class="card bg-dark text-light shadow-sm border-secondary h-100">
                
                {{-- GAMBAR KECIL (130px) --}}
                @if($product->image)
                    <img src="{{ asset('uploads/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 130px; object-fit: cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-secondary text-white small" style="height: 130px;">
                        No IMG
                    </div>
                @endif

                <div class="card-body text-center p-2 d-flex flex-column">
                    {{-- Judul Kecil & Terpotong jika panjang --}}
                    <h6 class="fw-bold text-warning text-truncate mb-1" style="font-size: 0.9rem;">{{ $product->name }}</h6>
                    
                    {{-- Harga Kecil --}}
                    <p class="text-info fw-bold small mb-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    
                    {{-- Tombol Kecil (btn-sm) --}}
                    <a href="{{ url('/produk/' . $product->id) }}" class="btn btn-warning btn-sm mt-auto fw-bold text-dark w-100" style="font-size: 0.75rem;">
                        Beli
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-white py-5">
            <p class="small">Belum ada produk.</p>
        </div>
        @endforelse

    </div>
</div>
@endsection