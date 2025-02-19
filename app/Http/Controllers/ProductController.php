<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with('images')->get(); // Ambil semua produk dengan relasi gambar
        return view('index', compact('products'));
    }
    
    // Menampilkan detail produk berdasarkan ID
    public function show($id) {
        $product = Product::with('images')->findOrFail($id);
        return view('product', compact('product'));
    }
}
