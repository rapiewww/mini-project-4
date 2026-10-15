@extends('layouts.app')

@section('content')
    <h2>Edit Produk</h2>

    <form method="POST" action="/products/{{ $product->id }}">
        @csrf 
        @method('PUT')
        
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}">
            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
            @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn">Update Data</button>
        <a href="/" style="margin-left: 10px; color: red;">Batal</a>
    </form>
@endsection
