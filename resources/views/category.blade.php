@extends('layouts.productLayout')

@section('title', 'Category')

@section('content')
<div class="container mt-5">
    <div class="row g-4" style="margin-bottom: 5rem;">
        @foreach($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4">
    <div class="card card-cat shadow-sm border-0 h-100">
        <div class="ratio ratio-4x3 bg-light position-relative">
            <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" 
                class="position-absolute top-0 start-0 w-100 h-100 preview-img" 
                style="object-fit: contain;" 
                alt="{{ $product->name }}">

            @if($product->glb_file)
                <model-viewer src="{{ asset('storage/' . $product->glb_file) }}"
                    class="position-absolute top-0 start-0 w-100 h-100 model-3d"
                    alt="Model 3D Produk"
                    auto-rotate
                    camera-controls
                    style="display: none;">
                </model-viewer>
            @endif
        </div>
        <div class="card-body">
            <h6 class="card-title">{{ Str::limit($product->name, 15, '...') }}</h6>
            <p class="card-text text-dark fw-bold">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
            <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-primary">Detail</a>
        </div>
    </div>
</div>

        @endforeach
    </div>
</div>

{{-- Hover effect to switch image/model-viewer --}}
<script>
    document.querySelectorAll(".card-cat").forEach(card => {
        let img = card.querySelector(".preview-img");
        let model = card.querySelector(".model-3d");

        if (!img || !model) return;

        card.addEventListener("mouseenter", () => {
            img.classList.add("hidden");
            setTimeout(() => {
                img.style.display = "none";
                model.style.display = "block";
                setTimeout(() => model.classList.remove("hidden"), 10);
            }, 300);
        });

        card.addEventListener("mouseleave", () => {
            model.classList.add("hidden");
            setTimeout(() => {
                model.style.display = "none";
                img.style.display = "block";
                setTimeout(() => img.classList.remove("hidden"), 10);
            }, 300);
        });
    });
</script>
@endsection
