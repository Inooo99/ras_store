@extends('layout2')

@section('title', 'Admin - Edit Sosmed')

@section('content')
<div class="admin-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Edit Layanan Sosmed</h2>
        <a href="{{ route('sosmed.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    
    <form action="{{ route('sosmed.update', $sosmed->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="form-label fw-bold">Nama Layanan</label>
            <input type="text" name="nama_layanan" value="{{ $sosmed->nama_layanan }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Harga</label>
            <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" name="harga" value="{{ $sosmed->harga }}" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ $sosmed->deskripsi }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">Ganti Gambar (Opsional)</label>
            <input type="file" name="gambar" class="form-control">
            
            @if($sosmed->gambar)
                <div class="mt-3 p-2 border rounded d-inline-block bg-light">
                    <small class="text-muted d-block mb-1">Gambar Saat Ini:</small>
                    {{-- Pastikan pakai 'uploads' --}}
                    <img src="{{ asset('uploads/' . $sosmed->gambar) }}" width="100" class="rounded">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">Update Layanan</button>
    </form>
</div>
@endsection