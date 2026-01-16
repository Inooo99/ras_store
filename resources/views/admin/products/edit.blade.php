@extends('layout2')

@section('title', 'Admin - Edit Produk')

@section('content')
<div class="admin-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Edit Produk</h2>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="form-label fw-bold">Nama Produk</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Harga</label>
            <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" name="price" value="{{ $product->price }}" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">Ganti Gambar (Opsional)</label>
            <input type="file" name="image" class="form-control">
            
            @if($product->image)
                <div class="mt-3 p-2 border rounded d-inline-block bg-light">
                    <small class="text-muted d-block mb-1">Gambar Saat Ini:</small>
                    <img src="{{ asset('uploads/' . $product->image) }}" width="100" class="rounded">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">Update Produk</button>
    </form>
</div>
@endsection