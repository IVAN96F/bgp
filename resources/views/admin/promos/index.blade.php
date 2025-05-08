@extends('layouts.app')

@section('title', 'Kelola Promo')

@section('content')
<div class="container">
    <h1 class="mb-4">Kelola Promo</h1>
    <a href="{{ route('admin.promos.create') }}" class="btn btn-primary mb-3">Tambah Promo</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($promos as $promo)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset('storage/' . $promo->image) }}" width="100"></td>
                    <td>{{ $promo->title }}</td>
                    <td>{{ Str::limit($promo->description, 50, '...') }}</td>
                    <td>
                        <a href="{{ route('admin.promos.edit', $promo->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.promos.destroy', $promo->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus promo ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

        
        
    </table>
</div>
@endsection
