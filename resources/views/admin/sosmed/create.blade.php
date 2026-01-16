@extends('layout2')

@section('title', 'Admin - Tambah Sosmed')

@section('content')
<div class="admin-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Tambah Layanan Sosmed</h2>
        <a href="{{ route('sosmed.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    
    <form action="{{ route('sosmed.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label class="form-label fw-bold">Nama Layanan</label>
            <input type="text" name="nama_layanan" class="form-control" placeholder="Contoh: 1000 Followers IG" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Harga</label>
            <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" name="harga" class="form-control" placeholder="Contoh: 25000" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi layanan (Garansi, dll)..."></textarea>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">Upload Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">Simpan Layanan</button>
    </form>
</div>
@endsection