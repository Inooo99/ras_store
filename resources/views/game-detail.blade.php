@extends('layout2')

@section('title', $game->nama_game . ' - Top Up Game')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-light shadow-lg border-secondary">
                
                <div class="card-header bg-transparent border-0 p-4 text-center">
                    @if($game->gambar)
                        <img src="{{ asset('uploads/' . $game->gambar) }}" 
                             alt="{{ $game->nama_game }}" 
                             class="img-fluid rounded shadow" 
                             style="max-height: 350px; width: auto; max-width: 100%; object-fit: contain;">
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-secondary text-white rounded" style="height: 250px;">
                            <h3 class="text-white-50">No Logo</h3>
                        </div>
                    @endif
                </div>

                <div class="card-body text-center px-5 pb-5">
                    <h2 class="fw-bold text-warning mb-2">{{ $game->nama_game }}</h2>
                    <div class="mb-4">
                        <span class="badge bg-success fs-6">{{ $game->nominal }}</span>
                    </div>
                    <h3 class="text-info fw-bold mb-4 display-6">Rp {{ number_format($game->harga, 0, ',', '.') }}</h3>
                    <hr class="border-secondary my-4">
                    <p class="text-white-50 fs-5 mb-5">
                        Top up <strong>{{ $game->nama_game }}</strong> nominal <strong>{{ $game->nominal }}</strong>. 
                        Proses cepat otomatis masuk ke akun Anda.
                    </p>

                    <div class="d-grid gap-2">
                        {{-- TOMBOL CHECKOUT (Ke Midtrans) --}}
                        <a href="{{ url('/beli-game/' . $game->id) }}" class="btn btn-warning btn-lg fw-bold text-dark shadow">
                            <i class="fas fa-gamepad me-2"></i> Top Up Sekarang
                        </a>
                        <a href="{{ url('/kategori/game') }}" class="btn btn-outline-light mt-2">&larr; Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection