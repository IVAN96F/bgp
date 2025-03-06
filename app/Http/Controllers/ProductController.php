<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Article;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $promos = Promo::latest()->get();
        $products = Product::with('images')->get();
        $categories = Category::all(); // Ambil semua produk dengan relasi gambar
        $articles = Article::latest()->get(); // Ambil data artikel
        return view('index', compact('products' , 'promos', 'categories', 'articles'));
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
    public function category($id) {
        // $products = Product::with('images')->get();
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->with('images')->get();
        return view('category' ,[
            'products' => $products,
            'category' => $category
        ]);
    }
}
