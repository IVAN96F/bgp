@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Kategori</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="images" class="form-label">Gambar Produk</label>
            <div id="image-preview-container"></div> <!-- Container Preview Gambar -->
            <input type="file" name="image" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("add-image").addEventListener("click", function () {
        let container = document.getElementById("image-upload-container");
        let newInput = document.createElement("div");
        newInput.classList.add("input-group", "mb-2");
        newInput.innerHTML = `
            <input type="file" name="images[]" class="form-control" onchange="previewImage(event)">
            <button type="button" class="btn btn-danger remove-image">X</button>
        `;
        container.appendChild(newInput);
    });

    document.getElementById("image-upload-container").addEventListener("click", function (event) {
        if (event.target.classList.contains("remove-image")) {
            event.target.parentElement.remove();
        }
    });
});

// Preview gambar sebelum upload
function previewImage(event) {
    let input = event.target;
    let reader = new FileReader();

    reader.onload = function () {
        let previewContainer = document.getElementById("image-preview-container");
        let imgPreview = document.createElement("img");
        imgPreview.src = reader.result;
        imgPreview.width = 100;
        imgPreview.classList.add("preview-image");
        previewContainer.appendChild(imgPreview);
    };

    reader.readAsDataURL(input.files[0]);
}
</script>

<style>
.preview-image {
    display: inline-block;
    margin: 10px;
    border: 1px solid #ddd;
    padding: 5px;
    border-radius: 5px;
}
</style>
@endsection
