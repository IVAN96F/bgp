@extends('layouts.articleLayout')

@section('title', $article->title)

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">{{ $article->title }}</h1>
    <p>
        <strong>Ditulis oleh:</strong> {{ $article->user->name ?? 'Anonim' }} 
    </p>
    <p>
        <strong>Tanggal:</strong> {{ $article->created_at->format('d M Y') }} pukul {{ $article->created_at->format('H:i') }}
    </p>
    
    <div class="content">
        @if ($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-fluid mb-3">
        @endif
    </div>
    <div>
        {!! nl2br(e($article->content)) !!}
    </div>

    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
