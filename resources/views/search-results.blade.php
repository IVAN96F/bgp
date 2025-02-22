@extends('layouts.productLayout')

@section('content')
<div class="container mt-4">
    <h3>Hasil Pencarian untuk: "{{ $query }}"</h3>

    @if($products->isEmpty())
        <p>Tidak ada produk yang ditemukan.</p>
    @else
    <div class="row d-flex justify-content-center">
        
        @foreach ($products as $product)
        <div class="col-6 col-md-4 col-lg-3 mb-4 {{ $loop->last ? 'last-row' : '' }}"> <!-- Tambahkan class jika card terakhir -->
            <a href="{{ route('product.show', $product->id) }}" class="text-decoration-none">
                <div class="card d-flex flex-column h-100 shadow-sm">
                    <img src="{{ asset('storage/' . ($product->images->first()->image_path ?? 'default.jpg')) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit($product->description, 50) }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
    
    </div>
    
    @endif
</div>
@endsection
