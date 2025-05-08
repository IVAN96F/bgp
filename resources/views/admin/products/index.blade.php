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
            <th>Kategori</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>3D Model</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <strong>{{ $product->category->name }}</strong>
            </td>
            <td>{{ $product->name }}</td>
            <td>Rp{{ number_format($product->price, 2) }}</td>
            <td>
                @foreach ($product->images as $image)
                    <img src="{{ asset('storage/' . $image->image_path) }}" width="50">
                @endforeach
            </td>
            <td>
                @if($product->glb_file)
                    <model-viewer src="{{ asset('storage/' . $product->glb_file) }}" 
                        alt="Model 3D Produk"
                        auto-rotate 
                        camera-controls 
                        style="width: 100px; height: 100px;">
                    </model-viewer>
                @else
                    <span class="text-muted">Tidak ada model</span>
                @endif
            </td>
            <td>
                {{ Str::limit($product->description, 200, '...') }}
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
<script type="module" src="https://unpkg.com/@google/model-viewer@latest/dist/model-viewer.min.js"></script>
@endsection
