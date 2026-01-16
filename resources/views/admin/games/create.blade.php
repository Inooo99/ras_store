@extends('layout2')

@section('title', 'Admin - Tambah Game')

@section('content')
<div class="admin-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Tambah Topup Game</h2>
        <a href="{{ route('games.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    
    <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label class="form-label fw-bold">Nama Game</label>
            <input type="text" name="nama_game" class="form-control" placeholder="Contoh: Mobile Legends" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Nominal Topup</label>
            <input type="text" name="nominal" class="form-control" placeholder="Contoh: 86 Diamonds" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Harga</label>
            <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" name="harga" class="form-control" placeholder="Contoh: 20000" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">Upload Gambar (Logo Game)</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">Simpan Game</button>
    </form>
</div>
@endsection