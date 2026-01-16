@extends('layout2')

@section('title', 'Admin - Edit Game')

@section('content')
<div class="admin-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Edit Topup Game</h2>
        <a href="{{ route('games.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    
    <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="form-label fw-bold">Nama Game</label>
            <input type="text" name="nama_game" value="{{ $game->nama_game }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Nominal Topup</label>
            <input type="text" name="nominal" value="{{ $game->nominal }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Harga</label>
            <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" name="harga" value="{{ $game->harga }}" class="form-control" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">Ganti Gambar (Opsional)</label>
            <input type="file" name="gambar" class="form-control">
            
            @if($game->gambar)
                <div class="mt-3 p-2 border rounded d-inline-block bg-light">
                    <small class="text-muted d-block mb-1">Logo Saat Ini:</small>
                    <img src="{{ asset('uploads/' . $game->gambar) }}" width="100" class="rounded">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">Update Game</button>
    </form>
</div>
@endsection