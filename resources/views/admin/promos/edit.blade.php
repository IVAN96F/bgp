@extends('layouts.app')

@section('title', 'Edit Promo')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Promo</h1>

    <form action="{{ route('admin.promos.update', $promo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $promo->title }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control">{{ $promo->description }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset('storage/' . $promo->image) }}" width="100" class="mt-2">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
