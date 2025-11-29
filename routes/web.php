<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rute untuk menampilkan daftar produk
Route::get('/product', [ProductController::class,'index'])->name('product.index'); 

// Rute untuk menyimpan produk baru
Route::post('/product', [ProductController::class,'store'])->name("product.store"); 

// Rute untuk menampilkan form tambah produk (BARU DITAMBAHKAN)
Route::get('/product/create', [ProductController::class,'create'])->name("product.create"); 

// Rute untuk menampilkan form edit produk (BARU DITAMBAHKAN)
Route::get('/product/{product}/edit', [ProductController::class,'edit'])->name("product.edit"); 

// Rute untuk memperbarui produk
Route::put('/product/{product}', [ProductController::class,'update'])->name("product.update"); 

// Rute untuk menghapus produk
Route::delete('/product/{product}', [ProductController::class,'destroy'])->name("product.destroy");