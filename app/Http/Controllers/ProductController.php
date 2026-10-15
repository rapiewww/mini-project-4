<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
       // READ (Tampil Data + Pencarian & Sorting)
    public function index(Request $request)
    {
        $products = Product::with('category')
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%"); // Fitur Search
            })
            ->orderBy('name') // Fitur Sorting Alphabet
            ->paginate(10)
            ->withQueryString(); // Mempertahankan hasil search saat pindah halaman (Slide 32)
            
        return view('products', compact('products'));
    }


    // CREATE (Tampil Form Tambah)
    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    // STORE (Simpan Data Baru)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:150',
            'category_id' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
        ]);

        Product::create($validated);
        return redirect('/')->with('success', 'Produk berhasil disimpan!');
    }

    // EDIT (Tampil Form Edit)
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('edit', compact('product', 'categories'));
    }

    // UPDATE (Simpan Perubahan)
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:150',
            'category_id' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
        ]);

        Product::findOrFail($id)->update($validated);
        return redirect('/')->with('success', 'Produk berhasil diperbarui!');
    }

    // DESTROY (Hapus Data)
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect('/')->with('success', 'Produk berhasil dihapus!');
    }
}
