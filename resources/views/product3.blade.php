@extends('layout2')

@section('title', 'Top Up Game - RAS STORE')

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold text-light">Top Up Game</h1>
    <p class="text-muted">Proses cepat, harga hemat, dan aman 100%.</p>
</div>

<div class="container">
    <div class="row justify-content-center">

        @forelse($games as $game)
        <div class="col-6 col-md-3 mb-4 px-2">
            <div class="card bg-dark text-light shadow-lg border-secondary h-100">
                
                @if($game->gambar)
                    <img src="{{ asset('uploads/' . $game->gambar) }}" class="card-img-top" style="height: 130px; object-fit: cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-secondary small" style="height: 130px;">No IMG</div>
                @endif

                <div class="card-body text-center d-flex flex-column p-3">
                    <h6 class="fw-bold text-warning text-truncate">{{ $game->nama_game }}</h6>
                    <div class="mb-1"><span class="badge bg-secondary" style="font-size: 0.6rem;">{{ $game->nominal }}</span></div>
                    <p class="text-info fw-bold mb-2 small">Rp {{ number_format($game->harga, 0, ',', '.') }}</p>
                    
                    <a href="{{ url('/game/' . $game->id) }}" class="btn btn-warning btn-sm mt-auto fw-bold text-dark w-100">
                        Top Up
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-white py-5">
            <p>Belum ada game.</p>
        </div>
        @endforelse

    </div>
</div>
@endsection