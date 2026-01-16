<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SosmedController extends Controller
{
    public function index()
    {
        $sosmeds = Sosmed::all();
        return view('admin.sosmed.index', compact('sosmeds'));
    }

    public function create()
    {
        return view('admin.sosmed.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'image|file|max:2048'
        ]);

        $data = $request->all();

        if ($request->file('gambar')) {
            // Simpan ke disk 'public' (yang sudah kita arahkan ke folder uploads)
            $data['gambar'] = $request->file('gambar')->store('sosmed-images', 'public');
        }

        Sosmed::create($data);

        return redirect()->route('sosmed.index')->with('success', 'Layanan berhasil ditambahkan!');
    }

    // FORM EDIT
    public function edit($id)
    {
        $sosmed = Sosmed::findOrFail($id);
        return view('admin.sosmed.edit', compact('sosmed'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $sosmed = Sosmed::findOrFail($id);

        $request->validate([
            'nama_layanan' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'image|file|max:2048'
        ]);

        $data = $request->all();

        if ($request->file('gambar')) {
            // Hapus gambar lama
            if ($sosmed->gambar) {
                Storage::disk('public')->delete($sosmed->gambar);
            }
            // Upload baru
            $data['gambar'] = $request->file('gambar')->store('sosmed-images', 'public');
        }

        $sosmed->update($data);

        return redirect()->route('sosmed.index')->with('success', 'Layanan berhasil diupdate!');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $sosmed = Sosmed::findOrFail($id);
        if ($sosmed->gambar) {
            Storage::disk('public')->delete($sosmed->gambar);
        }
        $sosmed->delete();
        return redirect()->route('sosmed.index')->with('success', 'Layanan berhasil dihapus!');
    }
}