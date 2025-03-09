<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class AdminArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.show', compact('article'));
    }


    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'nullable|image|max:2048'
    ]);

    $data = $request->all();
    $data['user_id'] = auth()->id(); // Tambahkan user_id dari pengguna yang sedang login

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('articles', 'public');
    }

    Article::create($data);
    return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil ditambahkan');
}

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
{
    // Pastikan hanya admin atau pemilik artikel yang dapat mengedit
    // if (Gate::denies('update', $article)) {
    //     abort(403, 'Anda tidak memiliki izin untuk mengedit artikel ini.');
    // }
    

    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'nullable|image|max:2048',
    ]);

    $data = $request->all();
    $data['user_id'] = auth()->id(); // Pastikan user_id tetap milik yang mengedit

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('articles', 'public');
    }

    $article->update($data);
    return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui');
}


    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus');
    }
}
