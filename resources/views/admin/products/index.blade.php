@extends('layout2')

@section('title', 'Admin - Daftar Produk')

@section('content')
<div class="admin-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Manajemen Aplikasi Premium</h2>
        <div>
            <a href="{{ route('products.create') }}" class="btn btn-dark">+ Tambah Produk</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">Gambar</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- PERHATIKAN: Disini menggunakan variable $products --}}
                @forelse ($products as $product)
                <tr>
                    <td class="text-center">
                        @if($product->image)
                            <img src="{{ asset('uploads/' . $product->image) }}" width="60" class="rounded">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td class="align-middle fw-bold">{{ $product->name }}</td>
                    <td class="align-middle">Rp {{ number_format($product->price) }}</td>
                    <td class="text-center align-middle">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-dark">Edit</a>
                        
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4">Belum ada data produk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection