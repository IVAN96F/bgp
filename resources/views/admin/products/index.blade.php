@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<h3>Daftar Produk</h3>
<form class="d-flex w-25 mb-4" role="search" method="GET" action="{{ route('admin.products.index') }}">
    <input class="form-control me-2" type="search" name="q" value="{{ request('q') }}" placeholder="Cari produk..." aria-label="Search">
    <button class="btn btn-outline-primary" type="submit">Search</button>
</form>
<a href="{{ route('admin.products.create') }}" class="btn btn-primary">Tambah Produk</a>
<table class="table mt-3">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->name }}</td>
            <td>Rp{{ number_format($product->price, 2) }}</td>
            <td>
                @foreach ($product->images as $image)
                    <img src="{{ asset('storage/' . $image->image_path) }}" width="50">
                @endforeach
            </td>
            <td>
                {{ $product->description }}
            </td>
            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Hapus produk?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
