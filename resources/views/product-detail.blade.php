@extends('layout2')

@section('title', $product->name . ' - Detail Produk')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            {{-- KARTU DETAIL PRODUK (Gaya Dark Mode) --}}
            <div class="card bg-dark text-light shadow-lg border-secondary">
                
                {{-- AREA GAMBAR (Saya perbaiki style-nya disini) --}}
                <div class="card-header bg-transparent border-0 p-4 text-center">
                    @if($product->image)
                        <img src="{{ asset('uploads/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="img-fluid rounded shadow" 
                             style="max-height: 350px; width: auto; max-width: 100%; object-fit: contain;">
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-secondary text-white rounded" style="height: 300px;">
                            <h3 class="text-white-50">No Image Available</h3>
                        </div>
                    @endif
                </div>

                <div class="card-body text-center px-3 pb-3">
                    {{-- Nama Produk --}}
                    <h2 class="fw-bold text-warning mb-2">{{ $product->name }}</h2>
                    
                    {{-- Kategori / Label Kecil (Opsional) --}}
                    <span class="badge bg-secondary mb-4">Produk Premium</span>

                    {{-- Harga --}}
                    <h3 class="text-info fw-bold mb-4 display-6">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
                    
                    {{-- Garis Pemisah --}}
                    <hr class="border-secondary my-4">

                    {{-- Deskripsi --}}
                    <p class="text-white-50 fs-5 mb-5 leading-relaxed text-start">
                        {{ $product->description }}
                    </p>

                    {{-- Tombol Aksi --}}
                    <div class="d-grid gap-2">
                        <a href="{{ url('/beli-premium/' . $product->id) }}" class="btn btn-warning btn-lg fw-bold text-dark shadow">
                            <i class="fas fa-shopping-cart me-2"></i> Beli Sekarang
                        </a>
                        <a href="{{ url('/') }}" class="btn btn-outline-light mt-2">
                            &larr; Kembali ke Daftar Produk
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection