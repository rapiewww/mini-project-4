<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; // Memanggil model kategori
use App\Models\Product;  // Memanggil model produk

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Membuat data Kategori
        $kategoriElektronik = Category::create(['name' => 'Elektronik']);
        $kategoriPakaian = Category::create(['name' => 'Pakaian']);

        // 2. Membuat data Produk dan menyambungkannya ke ID Kategori
        Product::create([
            'category_id' => $kategoriElektronik->id,
            'name' => 'MacBook Pro M1',
            'description' => 'Laptop untuk ngoding dan tugas kuliah',
            'price' => 20000000,
            'stock' => 5
        ]);

        Product::create([
            'category_id' => $kategoriPakaian->id,
            'name' => 'Kemeja Garis-Garis',
            'description' => 'Kemeja smart-casual warna cream',
            'price' => 250000,
            'stock' => 15
        ]);
    }
}
