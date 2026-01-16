@extends('layout2')

@section('title', 'Admin - Daftar Sosmed')

@section('content')
<div class="admin-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Manajemen Suntik Sosmed</h2>
        <div>
            <a href="{{ route('sosmed.create') }}" class="btn btn-dark">+ Tambah Layanan</a>
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
                    <th>Nama Layanan</th>
                    <th>Harga</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sosmeds as $item)
                <tr>
                    <td class="text-center">
                        @if($item->gambar)
                            <img src="{{ asset('uploads/' . $item->gambar) }}" width="60" class="rounded">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td class="align-middle fw-bold">{{ $item->nama_layanan }}</td>
                    <td class="align-middle">Rp {{ number_format($item->harga) }}</td>
                    <td class="text-center align-middle">
                        <a href="{{ route('sosmed.edit', $item->id) }}" class="btn btn-sm btn-dark">Edit</a>
                        
                        <form action="{{ route('sosmed.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus layanan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4">Belum ada layanan sosmed.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection