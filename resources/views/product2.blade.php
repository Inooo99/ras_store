@extends('layout2')

@section('title', 'Suntik Sosmed - RAS STORE')

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold text-light">Suntik Sosmed</h1>
    <p class="text-muted">Tingkatkan popularitas akunmu dengan followers aktif & real.</p>
</div>

<div class="container">
    <div class="row justify-content-center">

        @forelse($sosmeds as $item)
        <div class="col-6 col-md-3 mb-4 px-2">
            <div class="card bg-dark text-light shadow-lg border-secondary h-100">
                
                @if($item->gambar)
                    <img src="{{ asset('uploads/' . $item->gambar) }}" class="card-img-top" style="height: 130px; object-fit: cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-secondary small" style="height: 130px;">No IMG</div>
                @endif

                <div class="card-body text-center d-flex flex-column p-3">
                    <h6 class="fw-bold text-warning text-truncate">{{ $item->nama_layanan }}</h6>
                    <p class="text-info fw-bold mb-2 small">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>

                    <a href="{{ url('/sosmed/' . $item->id) }}" class="btn btn-warning btn-sm mt-auto fw-bold text-dark w-100">
                        Pesan
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-white py-5">
            <p>Belum ada layanan.</p>
        </div>
        @endforelse

    </div>
</div>
@endsection