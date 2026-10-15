@extends('layouts.app')

@section('content')
    <h2>Tambah Produk Baru</h2>

    <form method="POST" action="/products">
        @csrf 
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="category_id">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="price" value="{{ old('price') }}">
            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stock" value="{{ old('stock') }}">
            @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn">Simpan Data</button>
        <a href="/" style="margin-left: 10px; color: red;">Batal</a>
    </form>
@endsection
