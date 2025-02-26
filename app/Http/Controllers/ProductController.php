<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $promos = Promo::latest()->get();
        $products = Product::with('images')->get(); // Ambil semua produk dengan relasi gambar
        return view('index', compact('products' , 'promos'));
    }
    
    // Menampilkan detail produk berdasarkan ID
    public function show($id) {
        $product = Product::with('images')->findOrFail($id);
        return view('product', compact('product'));
    }

    public function search(Request $request)
{
    $query = $request->input('query'); // Ambil input pencarian

    // Cari produk berdasarkan nama atau deskripsi
    $products = Product::where('name', 'LIKE', "%$query%")
                        ->orWhere('description', 'LIKE', "%$query%")
                        ->get();

    return view('search-results', compact('products', 'query'));
}
}
