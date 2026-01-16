<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // MENAMPILKAN DAFTAR PRODUK (ADMIN DASHBOARD)
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // FORM TAMBAH PRODUK
    public function create()
    {
        return view('admin.products.create');
    }

    // SIMPAN PRODUK KE DATABASE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|file|max:2048', // Maksimal 2MB
        ]);

        $data = $request->all();

        if ($request->file('image')) {
            // PERBAIKAN: Tambahkan parameter 'public' agar masuk ke folder uploads
            $data['image'] = $request->file('image')->store('product-images', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // FORM EDIT PRODUK
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // UPDATE PRODUK
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $data = $request->all();

        if ($request->file('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            // PERBAIKAN: Tambahkan parameter 'public' disini juga
            $data['image'] = $request->file('image')->store('product-images', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');
    }

    // HAPUS PRODUK
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk dihapus!');
    }
}