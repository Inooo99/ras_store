@extends('layout2')

@section('title', 'Admin - Daftar Game')

@section('content')
<div class="admin-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Manajemen Topup Game</h2>
        <div>
            <a href="{{ route('games.create') }}" class="btn btn-dark">+ Tambah Game</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">Logo</th>
                    <th>Nama Game</th>
                    <th>Nominal</th>
                    <th>Harga</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($games as $item)
                <tr>
                    <td class="text-center">
                        @if($item->gambar)
                            <img src="{{ asset('uploads/' . $item->gambar) }}" width="60" class="rounded">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td class="align-middle fw-bold">{{ $item->nama_game }}</td>
                    <td class="align-middle">{{ $item->nominal }}</td>
                    <td class="align-middle">Rp {{ number_format($item->harga) }}</td>
                    <td class="text-center align-middle">
                        <a href="{{ route('games.edit', $item->id) }}" class="btn btn-sm btn-dark">Edit</a>
                        
                        <form action="{{ route('games.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus game ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">Belum ada data game.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection