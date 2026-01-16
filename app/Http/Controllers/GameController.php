<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('admin.games.index', compact('games'));
    }

    public function create()
    {
        return view('admin.games.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_game' => 'required',
            'nominal' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'image|file|max:2048'
        ]);

        $data = $request->all();

        if ($request->file('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('game-images', 'public');
        }

        Game::create($data);

        return redirect()->route('games.index')->with('success', 'Game berhasil ditambahkan!');
    }

    // FORM EDIT
    public function edit($id)
    {
        $game = Game::findOrFail($id);
        return view('admin.games.edit', compact('game'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);
        
        $request->validate([
            'nama_game' => 'required',
            'nominal' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'image|file|max:2048'
        ]);

        $data = $request->all();

        if ($request->file('gambar')) {
            // Hapus gambar lama
            if ($game->gambar) {
                Storage::disk('public')->delete($game->gambar);
            }
            // Upload baru
            $data['gambar'] = $request->file('gambar')->store('game-images', 'public');
        }

        $game->update($data);

        return redirect()->route('games.index')->with('success', 'Game berhasil diupdate!');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        if ($game->gambar) {
            Storage::disk('public')->delete($game->gambar);
        }
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Game berhasil dihapus!');
    }

    // --- TAMBAHAN UNTUK PUBLIC VIEW ---
    public function showPublic($id)
    {
        // Cari data game
        $game = \App\Models\Game::findOrFail($id);
        return view('game-detail', compact('game'));
    }
}