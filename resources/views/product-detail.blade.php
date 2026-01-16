@extends('layout2')

@section('title', $product->name . ' - Detail Produk')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-light shadow-lg border-secondary">
                
                {{-- GAMBAR (Dibatasi Tingginya Biar Rapi) --}}
                <div class="card-header bg-transparent border-0 p-4 text-center">
                    @if($product->image)
                        <img src="{{ asset('uploads/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="img-fluid rounded shadow" 
                             style="max-height: 350px; width: auto; max-width: 100%; object-fit: contain; margin: 0 auto;">
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-secondary text-white rounded" style="height: 250px;">
                            <h3 class="text-white-50">Tidak Ada Gambar</h3>
                        </div>
                    @endif
                </div>

                <div class="card-body text-center px-5 pb-5">
                    <h2 class="fw-bold text-warning mb-2">{{ $product->name }}</h2>
                    <span class="badge bg-secondary mb-4">Aplikasi Premium</span>
                    <h3 class="text-info fw-bold mb-4 display-6">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
                    <hr class="border-secondary my-4">
                    
                    {{-- Deskripsi --}}
                    <p class="text-white-50 fs-5 mb-5 leading-relaxed text-start">
                        {{ $product->description }}
                    </p>

                    <div class="d-grid gap-2">
                        <a href="{{ url('/beli-premium/' . $product->id) }}" class="btn btn-warning btn-lg fw-bold text-dark shadow">
                            <i class="fas fa-shopping-cart me-2"></i> Beli Sekarang
                        </a>
                        <a href="{{ url('/') }}" class="btn btn-outline-light mt-2">&larr; Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection