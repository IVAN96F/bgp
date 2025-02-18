<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all(); // Ambil semua data produk dari database
        return view('index', compact('products'));
    }
}
