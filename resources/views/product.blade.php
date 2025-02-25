@extends('layouts.productLayout')

@section('content')
        <!-- Produk Section -->
        <div class="product-container">
            <!-- Gambar Produk -->
            <div id="carouselBanner" class="carousel slide w-100" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($product->images as $index => $image)
                        <button type="button" data-bs-target="#carouselBanner" 
                                data-bs-slide-to="{{ $index }}" 
                                class="{{ $index == 0 ? 'active' : '' }}"></button>
                    @endforeach
                </div>
            
                <div class="carousel-inner">
                    @foreach ($product->images as $index => $image)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $image->image_path) }}" 
                                 class="d-block w-100 img-fluid" 
                                 alt="{{ $product->name }}" style="height: 300px; width: 100%; object-fit: cover; width: auto; height: auto;">
                            
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
            

            <!-- Detail Produk -->
            <div class="product-details mt-4">
                <h1>{{ $product->name }}</h1>
                <p class="text-muted">{{ $product->description }}</p>
                <h3 class="text-danger">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
                <div class="d-flex justify-content-between mt-2">
                    <button class="btn btn-warning">
                        <i class="bi bi-camera"></i>
                    </button>
                    <button class="btn btn-success btn-favorite" data-product-id="{{ $product->id }}">
                        <i class="bi bi-star-fill"></i> Add to Favorite
                    </button>
                </div>
            </div>
        </div>

        <!-- Produk Terkait -->
        {{-- <div class="related-products mt-5">
            <h6>Produk Terkait</h6>
            <div class="d-flex justify-content-around">
                @foreach ($relatedProducts as $related)
                    <div class="card text-center" style="width: 45%;">
                        <a href="{{ route('product.show', $related->id) }}" class="text-decoration-none">
                            <img src="{{ asset('storage/' . ($related->images->first()->image_path ?? 'default.jpg')) }}" class="card-img-top" alt="{{ $related->name }}">
                            <div class="card-body">
                                <h6>{{ $related->name }}</h6>
                                <p class="text-muted">{{ $related->description }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div> --}}


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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
@endsection
