<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Otomatis mengarahkan localhost:8000 ke halaman produk
Route::get('/', function () {
    return redirect('/products');
});

// INI YANG DIMINTA DOSEN: 1 baris aja untuk mengatur Create, Read, Update, Delete!
Route::resource('products', ProductController::class);
