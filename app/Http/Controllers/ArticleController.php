<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.show', compact('article'));
    }

    public function index(Request $request)
{
    // Ambil query pencarian dari URL
    $search = $request->input('q');

    // Query data artikel, filter jika ada pencarian
    $articles = Article::when($search, function ($query, $search) {
        return $query->where('title', 'like', "%{$search}%")
                     ->orWhere('content', 'like', "%{$search}%");
    })->latest()->paginate(10);

    // Kirim data ke view
    return view('articles.index', compact('articles', 'search'));

}

}

