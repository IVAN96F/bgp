@extends('layouts.app') {{-- Menggunakan layout utama --}}

@section('title', 'Daftar Artikel')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Daftar Artikel</h2>

    {{-- Search --}}
    <form class="d-flex w-auto mb-4" role="search" method="GET" action="{{ route('artikel') }}">
        <input class="form-control me-2" type="search" name="q" value="{{ request('q') }}" placeholder="Cari artikel..." aria-label="Search">
        <button class="btn btn-outline-warning" type="submit">Search</button>
    </form>

    <div class="row">
        @foreach ($articles as $article)
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ Str::limit($article->content, 100, '...') }}</p>
                    <p class="text-muted"><strong>Penulis:</strong> {{ $article->user->name ?? 'Tidak diketahui' }}</p>
                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Paginate --}}
    <div class="d-flex justify-content-center">
        {{ $articles->links() }}
    </div>
</div>
@endsection
