@extends('layout2')

@section('title', $sosmed->nama_layanan . ' - Detail Layanan')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-light shadow-lg border-secondary">
                
                <div class="card-header bg-transparent border-0 p-4 text-center">
                    @if($sosmed->gambar)
                        <img src="{{ asset('uploads/' . $sosmed->gambar) }}" 
                             alt="{{ $sosmed->nama_layanan }}" 
                             class="img-fluid rounded shadow" 
                             style="max-height: 350px; width: auto; max-width: 100%; object-fit: contain;">
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-secondary text-white rounded" style="height: 250px;">
                            <h3 class="text-white-50">No Image</h3>
                        </div>
                    @endif
                </div>

                <div class="card-body text-center px-5 pb-5">
                    <h2 class="fw-bold text-warning mb-2">{{ $sosmed->nama_layanan }}</h2>
                    <span class="badge bg-primary mb-4">Suntik Sosmed</span>
                    <h3 class="text-info fw-bold mb-4 display-6">Rp {{ number_format($sosmed->harga, 0, ',', '.') }}</h3>
                    <hr class="border-secondary my-4">
                    <p class="text-white-50 fs-5 mb-5 leading-relaxed text-start">
                        {{ $sosmed->deskripsi }}
                    </p>

                    <div class="d-grid gap-2">
                        {{-- TOMBOL CHECKOUT (Ke Midtrans) --}}
                        <a href="{{ url('/beli-sosmed/' . $sosmed->id) }}" class="btn btn-warning btn-lg fw-bold text-dark shadow">
                            <i class="fas fa-rocket me-2"></i> Pesan Layanan
                        </a>
                        <a href="{{ url('/kategori/sosmed') }}" class="btn btn-outline-light mt-2">&larr; Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection