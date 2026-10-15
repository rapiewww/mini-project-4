@extends('layouts.app')

@section('content')
    <h2>Daftar Produk Inventory</h2>

    <!-- Ini Component Alert sederhana -->
        @if(session('success'))
        <x-alert>
            {{ session('success') }}
        </x-alert>
    @endif


    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
        <a href="/products/create" class="btn" style="margin-bottom: 0;">+ Tambah Produk</a>
        
        <!-- INI KOTAK PENCARIAN YANG DIMINTA DOSEN -->
        <form method="GET" action="/products" style="margin: 0; display: flex; gap: 5px;">
            <input type="text" name="search" placeholder="Cari nama produk..." value="{{ request('search') }}" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            <button type="submit" class="btn" style="margin-bottom: 0;">Cari</button>
            <a href="/products" class="btn" style="background: #6c757d; margin-bottom: 0;">Reset</a>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $index => $product)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->name }}</td>
                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="/products/{{ $product->id }}/edit" class="btn" style="background: #ffc107; color: black; margin-bottom: 0; padding: 5px 10px;">Edit</a>
                    <form action="/products/{{ $product->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn" style="background: #dc3545; margin-bottom: 0; padding: 5px 10px;" onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center;">Tidak ada produk yang ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div style="margin-top: 15px;">
        {{ $products->links() }}
    </div>
@endsection
