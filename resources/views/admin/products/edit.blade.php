@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Produk</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Produk</label>
            <div id="existing-images">
                @foreach ($product->images as $image)
                    <div class="image-preview">
                        <img src="{{ asset('storage/' . $image->image_path) }}" width="100">
                        <button type="button" class="btn btn-danger btn-sm remove-existing" data-id="{{ $image->id }}">Hapus</button>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Tambah Gambar Baru</label>
            <div id="image-preview-container"></div> <!-- Preview gambar baru -->
            <div id="image-upload-container">
                <div class="input-group mb-2">
                    <input type="file" name="images[]" class="form-control" onchange="previewImage(event)">
                    <button type="button" class="btn btn-danger remove-image">X</button>
                </div>
            </div>
            <button type="button" id="add-image" class="btn btn-secondary">Tambah Gambar</button>
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

    document.getElementById("existing-images").addEventListener("click", function (event) {
        if (event.target.classList.contains("remove-existing")) {
            let imageId = event.target.dataset.id;
            if (confirm("Hapus gambar ini?")) {
                fetch(`/admin/products/delete-image/${imageId}`, { method: "DELETE", headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" } })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            event.target.parentElement.remove();
                        } else {
                            alert("Gagal menghapus gambar.");
                        }
                    });
            }
        }
    });
});

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
.image-preview {
    display: inline-block;
    position: relative;
    margin: 10px;
}
.image-preview img {
    border-radius: 5px;
    border: 1px solid #ddd;
}
.image-preview button {
    position: absolute;
    top: -10px;
    right: -10px;
}
</style>
@endsection
