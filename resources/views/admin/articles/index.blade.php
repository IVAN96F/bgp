@extends('layouts.app')

@section('title', 'Manajemen Artikel')

@section('content')
<div class="container">
    <h2 class="mb-4">Manajemen Artikel</h2>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary mb-3">Tambah Artikel</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Content</th>
                <th>Author</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ Str::limit($article->content, 50, '...') }}</td> <!-- Menampilkan isi artikel -->
                    <td>{{ $article->user ? $article->user->name : 'Anonim' }}</td>

                    <td>
                        @if($article->image)
                        {{-- {{ dd($article->image) }} --}}
                        <img src="{{ url('storage/' . $article->image) }}" width="100">

                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('admin.articles.show', $article->id) }}" class="btn btn-info btn-sm">Preview</a>
                        <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        
    </table>

    {{ $articles->links() }}
</div>
@endsection
