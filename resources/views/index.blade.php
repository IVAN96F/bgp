@extends('layouts.productLayout')

@section('title', 'Home')
    

@section('content')
    


    <!--banner-->
    <div id="carouselBanner" class="carousel slide mt-3" data-bs-ride="carousel">
        <!-- Indikator (opsional) -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="2"></button>
        </div>
    
        <!-- Wrapper untuk slide -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/tes.png') }}" class="d-block w-100 img-fluid" alt="Banner 1" style="height: 300px; width: 100%; object-fit: cover; width: auto; height: auto;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/tes.png') }}" class="d-block w-100 img-fluid" alt="Banner 2" style="height: 300px; width: 100%; object-fit: cover; width: auto; height: auto;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/tes.png') }}" class="d-block w-100 img-fluid" alt="Banner 3" style="height: 300px; width: 100%; object-fit: cover; width: auto; height: auto;">
            </div>
        </div>
    
        <!-- Tombol navigasi -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    

{{-- <!--TERLARIS-->
    <div class="container mt-4">
        <h2 class="text-center mb-4">Terlaris</h2>
        <div class="slider">
            <div class="item">

                <img src="{{ asset('img/chair.jpg') }}" alt="" />
            </div>
            <div class="item">
                <img src="{{ asset('img/chair2.jpg') }}" alt="" />
            </div>
            <div class="item">
                <img src="{{ asset('img/chair3.jpg') }}" alt="" />
            </div>
            <div class="item">
                <img src="{{ asset('img/chair4.png') }}" alt="" />
            </div>
            <div class="item">
                <img src="{{ asset('img/chair5.png')  }}" alt="" />
            </div>
        </div>
    </div> --}}

         <!--featured product-->
         <div class="container py-4">
            <h2 class="text-center mb-4">Our Featured Products</h2>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach ($products as $product)
                    @php
                        $firstImage = $product->images->first()->image_path ?? 'default.jpg';
                    @endphp
                    <div class="col">
                        <a href="{{ route('product.show', $product->id) }}" class="text-decoration-none">
                            <div class="card h-100 text-center">
                                <img src="{{ asset('storage/' . $firstImage) }}" class="card-img-top" alt="{{ $product->name }}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="mt-2 text-start" style="font-size: 18px">{{ $product->name }}</h5>
                                    <p class="text-start flex-grow-1" style="font-size: 15px">{{ $product->description }}</p>
                                    <p class="text-start" style="font-size: 15px">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                </div>
                                <div class="card-footer">
                                    <form action="" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-star-fill text-warning"></i></button>
                                    </form>
                                </div>
                                <div>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        
    <!--bagaskara news-->
    <div class="container py-5">
        <h3 class="text-center mt-4">bagaskara news</h3>
        <div class="row g-4">
            <a href="" class="text-decoration-none d-flex justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="bg-secondary" style="height: 200px;"></div>
                            <h5 class="mt-2">Judul</h5>
                            <p>content</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="text-decoration-none d-flex justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="bg-secondary" style="height: 200px;"></div>
                            <h5 class="mt-2">Judul</h5>
                            <p>content</p>
                        </div>
                    </div>
                </div>
            </a>
            
        </div>

        
    </div>
    <div class="row">
        <div class="col-12">
            <div class="text-center mt-4">
                <h5>We Are SVLK And FSC Certified</h5>
                <img src="{{ asset('img/svlk.png') }}" alt="">
            </div>
        </div>
    </div>
    <!-- Contact -->
    <section id="contact" class="text-center mt-5" style="margin-bottom: 10em !important">
        <h2 class="section-title mb-3 mt-3">Our Contact</h2>
        <div class="container">
            <div class="row justify-content-center g-3">
                <div class="col-md-5 col-10 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/gmail.png') }}" alt="Email" width="26" class="me-2">
                    <span>email@example.com</span>
                </div>
                <div class="col-md-5 col-10 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/fb.png') }}" alt="Facebook" width="26" class="me-2">
                    <span>bagaskara</span>
                </div>
                <div class="col-md-5 col-10 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/wa.png') }}" alt="WhatsApp" width="32" class="me-2">
                    <span>02982872626667</span>
                </div>
                <div class="col-md-5 col-10 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/phone.png') }}" alt="Phone" width="20" class="me-2">
                    <span>+63736666368</span>
                </div>
                <div class="col-md-5 col-10 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/Instagram.png') }}" alt="Instagram" width="26" class="me-2">
                    <span>@shrl.amri</span>
                </div>
            </div>
        </div>
    </section>



    
    <script>
        $(document).ready(function () {
            $(".slider").slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            speed: 500,
            autoplaySpeed: 5000,
            infinite: true,
            autoplay: true,
            centerMode: true,
            centerPadding: "0",
            arrows: false
            });
        });

        
    </script>
@endsection