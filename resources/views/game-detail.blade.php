@extends('layout2')
@section('title', $game->nama_game)

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-light shadow-lg border-secondary">
                <div class="card-header bg-transparent border-0 p-4 text-center">
                    @if($game->gambar)
                        <img src="{{ asset('uploads/' . $game->gambar) }}" class="img-fluid rounded shadow" style="max-height: 300px;">
                    @endif
                </div>
                <div class="card-body text-center px-5 pb-5">
                    <h2 class="fw-bold text-warning">{{ $game->nama_game }}</h2>
                    <span class="badge bg-success mb-3">{{ $game->nominal }}</span>
                    <h3 class="text-info fw-bold mb-4">Rp {{ number_format($game->harga, 0, ',', '.') }}</h3>
                    
                    {{-- TOMBOL BELI -> LANJUT KE MIDTRANS --}}
                    <div class="d-grid gap-2">
                        <a href="{{ url('/beli-game/' . $game->id) }}" class="btn btn-warning btn-lg fw-bold text-dark">Top Up Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection