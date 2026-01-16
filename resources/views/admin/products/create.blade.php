@extends('layout2')

@section('title', 'Admin - Tambah Produk')

@section('content')
<div class="admin-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Tambah Produk Baru</h2>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label class="form-label fw-bold">Nama Produk</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan nama produk..." required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Harga (Angka saja)</label>
            <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" name="price" class="form-control" placeholder="Contoh: 50000" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi singkat produk..."></textarea>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">Upload Gambar</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">Simpan Produk</button>
    </form>
</div>
@endsection