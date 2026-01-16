@extends('layout2')

@section('title', 'Top Up Game - RAS STORE')

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold text-light">Top Up Game</h1>
    <p class="text-muted">Proses cepat, harga hemat, dan aman 100%.</p>
</div>

<div class="container">
    <div class="row justify-content-center">

        {{-- LOOPING GAMES --}}
        @forelse($games as $game)
        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-light shadow-lg border-secondary h-100">
                
                @if($game->gambar)
                    <img src="{{ asset('uploads/' . $game->gambar) }}" class="card-img-top" style="height: 250px; object-fit: cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-secondary" style="height: 250px;">No Logo</div>
                @endif

                <div class="card-body text-center d-flex flex-column">
                    <h4 class="fw-bold text-warning">{{ $game->nama_game }}</h4>
                    
                    {{-- Tampilkan Nominal (Contoh: 86 Diamonds) --}}
                    <div class="badge bg-secondary mb-2 fs-6">{{ $game->nominal }}</div>
                    
                    <p class="text-info fw-bold fs-5">Rp {{ number_format($game->harga, 0, ',', '.') }}</p>
                    
                    {{-- Pembelian --}}
                    <a href="{{ url('/beli-game/' . $game->id) }}" class="btn btn-warning mt-3 fw-bold text-dark w-100">
                        Top Up Sekarang
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-white py-5">
            <h3>Belum ada produk game tersedia.</h3>
        </div>
        @endforelse

    </div>
</div>
@endsection