@extends('layout2')

{{-- Judul Halaman --}}
@section('title', $product->name . ' - Detail Produk')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            {{-- KARTU PRODUK (Gaya Dark Mode) --}}
            <div class="card bg-dark text-light shadow-lg border-secondary">
                
                {{-- Gambar --}}
                @if($product->image)
                    <img src="{{ asset('uploads/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="max-height: 400px; object-fit: cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-secondary text-white" style="height: 300px;">
                        No Image Available
                    </div>
                @endif

                <div class="card-body text-center p-5">
                    {{-- Nama Produk --}}
                    <h2 class="fw-bold text-warning mb-3">{{ $product->name }}</h2>
                    
                    {{-- Harga --}}
                    <h3 class="text-info fw-bold mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
                    
                    {{-- Deskripsi --}}
                    <p class="text-white-50 fs-5 mb-5 leading-relaxed">
                        {{ $product->description }}
                    </p>

                    {{-- Tombol Beli (Mengarah ke rute beli-premium) --}}
                    <a href="{{ url('/beli-premium/' . $product->id) }}" class="btn btn-warning btn-lg fw-bold text-dark w-100 shadow">
                        Beli Sekarang
                    </a>
                </div>
            </div>
            
            {{-- Tombol Kembali --}}
            <div class="text-center mt-4 mb-5">
                <a href="{{ url('/') }}" class="text-muted text-decoration-none hover:text-white transition">
                    &larr; Kembali ke Halaman Utama
                </a>
            </div>

        </div>
    </div>
</div>
@endsection