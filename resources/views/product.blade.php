@extends('layouts.productLayout')

@section('title', 'Details')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Gambar Produk -->
        <div class="col-md-6">
            <div id="carouselBanner" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($product->images as $index => $image)
                        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner rounded shadow">
                    @foreach ($product->images as $index => $image)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $image->image_path) }}" class="d-block w-100" alt="{{ $product->name }}" style="height: 20em; object-fit: cover;">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>

        <!-- Detail Produk -->
        <div class="col-md-6 mt-4 mt-md-0">
            <div class="product-details">
                <h1>{{ $product->name }}</h1>
                <p class="text-muted">{{ $product->description }}</p>
                <h3 class="text-danger">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>

                <div class="mt-3 row g-2">
                    @if ($product->glb_file)
                        <div class="col-6">
                            <a href="{{ route('camera', $product->id) }}" class="btn btn-warning w-100">
                                <i class="bi bi-camera"></i> Try On 3D Models
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('ar.marker', $product->id) }}" class="btn btn-warning w-100">
                                <i class="bi bi-upc-scan"></i> Try AR with Marker
                            </a>
                        </div>
                    @else
                        <div class="col-12">
                            <span class="text-danger">Belum ada 3D model</span>
                        </div>
                    @endif
                
                    <div class="col-6">
                        <button class="btn btn-success w-100 btn-favorite" data-product-id="{{ $product->id }}">
                            <i class="bi bi-star-fill"></i> Favorite
                        </button>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('redirect.gmail') }}" target="_blank" class="btn btn-warning text-dark w-100">
                            Order by Email
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Produk Terkait -->
    <div class="mt-5">
        <h4>Produk Terkait</h4>
        @if ($relatedProducts->total() > 0)
            <div class="row">
                @foreach ($relatedProducts as $related)
                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <div class="card h-100 shadow-sm">
                            @if ($related->images->first())
                                <img src="{{ asset('storage/' . $related->images->first()->image_path) }}" class="card-img-top" alt="{{ $related->name }}" style="height: 10em; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h6 class="card-title text-truncate">{{ $related->name }}</h6>
                                <p class="card-text text-dark">Rp {{ number_format($related->price, 0, ',', '.') }}</p>
                                <a href="{{ route('product.show', $related->id) }}" class="btn btn-sm btn-warning w-100 text-dark">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $relatedProducts->links('pagination::bootstrap-5') }}
            </div>
        @else
            <p class="text-muted">Tidak ada produk terkait.</p>
        @endif
    </div>
    
</div>

<!-- Favorite Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('.btn-favorite').click(function () {
            let productId = $(this).data('product-id');

            $.ajax({
                url: "{{ route('favorite.add') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId
                },
                success: function (response) {
                    alert(response.message);
                },
                error: function (xhr) {
                    alert(xhr.responseJSON.error);
                }
            });
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
