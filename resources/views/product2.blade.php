@extends('layout2')

@section('title', 'Suntik Sosmed - RAS STORE')

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold text-light">Suntik Sosmed</h1>
    <p class="text-muted">Tingkatkan popularitas akunmu dengan followers aktif & real.</p>
</div>

<div class="container">
    <div class="row justify-content-center">

        {{-- LOOPING SOSMED --}}
        @forelse($sosmeds as $item)
        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-light shadow-lg border-secondary h-100">
                
                @if($item->gambar)
                    <img src="{{ asset('uploads/' . $item->gambar) }}" class="card-img-top" style="height: 250px; object-fit: cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-secondary" style="height: 250px;">No Image</div>
                @endif

                <div class="card-body text-center d-flex flex-column">
                    <h4 class="fw-bold text-warning">{{ $item->nama_layanan }}</h4>
                    <p class="text-info fw-bold mb-2">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                    <p class="small text-white-50 flex-grow-1">{{ $item->deskripsi }}</p>

                    {{-- Pembelian --}}
                    <a href="{{ url('/beli-sosmed/' . $item->id) }}" class="btn btn-warning mt-3 fw-bold text-dark w-100">
                        Pesan Layanan
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-white py-5">
            <h3>Belum ada layanan sosmed tersedia.</h3>
        </div>
        @endforelse

    </div>
</div>
@endsection