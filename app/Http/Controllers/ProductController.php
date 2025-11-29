<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view("product", compact("products"));
    }

    public function store(Request $request) 
    { 
        $validated = $request->validate([ 
            'name' => 'required|min:4', 
            'price' => 'required|integer|min:1000000', 
        ]); 
 
        Product::create($validated); 
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan'); 
    }

    public function update(Request $request, Product $product) 
    { 
        $validated = $request->validate([ 
            'name' => 'required|min:4', 
            'price' => 'required|integer|min:1000000', 
        ]); 
 
        $product->update($validated); 
        return redirect()->route('products')->with('success', 'Produk berhasil diperbarui'); 
    }

    public function destroy(Product $product) 
    { 
        $product->delete(); 
        return redirect()->route('products')->with('success', 'Produk berhasil dihapus'); 
    }
}

//$ adalah variabel
