@extends('layouts.productLayout')

@section('title', 'Hasil Pencarian')

@section('content')
<style>
    .preview-img, .model-3d {
        transition: opacity 0.3s ease;
    }

    .hidden {
        opacity: 0 !important;
    }

    .card-cat:hover {
        transform: scale(1.02);
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .ratio-4x3 {
        aspect-ratio: 4 / 3;
        background-color: #f8f9fa;
        position: relative;
        overflow: hidden;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    @media (max-width: 576px) {
        .col-6 {
            padding-right: 8px;
            padding-left: 8px;
        }
    }
</style>

<div class="container mt-4">
    <h4 class="mb-4">Hasil Pencarian untuk: "{{ $query }}"</h4>

    @if($products->isEmpty())
        <p class="text-muted">Tidak ada produk yang ditemukan.</p>
    @else
        <div class="row g-4" style="margin-bottom: 5rem;">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="card card-cat shadow-sm border-0 h-100">
                    <div class="ratio ratio-4x3 position-relative bg-light">
                        <img src="{{ asset('storage/' . ($product->images->first()->image_path ?? 'default.jpg')) }}" 
                             class="position-absolute top-0 start-0 w-100 h-100 preview-img" 
                             style="object-fit: contain;" 
                             alt="{{ $product->name }}">

                        @if($product->glb_file)
                            <model-viewer src="{{ asset('storage/' . $product->glb_file) }}"
                                class="position-absolute top-0 start-0 w-100 h-100 model-3d hidden"
                                alt="Model 3D Produk"
                                auto-rotate
                                camera-controls
                                interaction-prompt="none"
                                exposure="1"
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
    @endif
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
