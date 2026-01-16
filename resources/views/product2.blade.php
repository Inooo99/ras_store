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
        <div class="col-6 col-md-3 mb-3 px-2"> <div class="card bg-dark text-light shadow-sm border-secondary h-100">
                
                @if($item->gambar)
                    <img src="{{ asset('uploads/' . $item->gambar) }}" class="card-img-top" style="height: 130px; object-fit: cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-secondary small" style="height: 130px;">No IMG</div>
                @endif

                <div class="card-body text-center p-2 d-flex flex-column">
                    <h6 class="fw-bold text-warning text-truncate mb-1" style="font-size: 0.9rem;">{{ $item->nama_layanan }}</h6>
                    <p class="text-info fw-bold small mb-1">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                    
                    {{-- PERBAIKAN LINK DISINI: KE /sosmed/ BUKAN /beli-sosmed/ --}}
                    <a href="{{ url('/sosmed/' . $item->id) }}" class="btn btn-warning btn-sm mt-auto fw-bold text-dark w-100" style="font-size: 0.75rem;">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-white py-5">
            <p>Kosong.</p>
        </div>
        @endforelse

    </div>
</div>
@endsection