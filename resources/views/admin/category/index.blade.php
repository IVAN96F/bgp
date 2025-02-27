@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<h3>Daftar Produk</h3>
<a href="{{ route('admin.category.create') }}" class="btn btn-primary">Tambah Kategori</a>
<table class="table mt-3">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td><img src="{{ asset('storage/' . $category->image_path) }}" width="50" alt="{{ $category->name }}"></td>
            <td>
                {{ $category->description }}
            </td>
            <td>
                <a href="{{ route('admin.category.edit', $category->id) }}">Edit</a>
                <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
