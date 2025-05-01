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
            @foreach ($promos as $key => $promo)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $promo->image) }}" class="d-block w-100" alt="{{ $promo->title }}" style="height: 300px; object-fit: cover;">
                </div>
            @endforeach
        </div>
        
    
        <!-- Tombol navigasi -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

         <!--featured product-->
         <div class="container py-4">
            <h2 class="text-center mb-4">Our Featured Categories</h2>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach ($categories as $category)
                    <div class="col">
                        <a href="{{ route('category', $category->id) }}" class="text-decoration-none">
                            <div class="card h-100 text-center">
                                <img src="{{ asset('storage/' . $category->image_path) }}" class="card-img-top" alt="{{ $category->name }}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="mt-2 text-start" style="font-size: 18px">{{ $category->name }}</h5>
                                    <p class="text-start flex-grow-1" style="font-size: 15px">{{ $category->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        
    
    <!-- Bagaskara News -->
    <div class="container py-5">
        <h3 class="text-center mt-4">Bagaskara News</h3>
        <div class="row g-4">
            @foreach ($articles as $article)
            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ Str::limit($article->content, 100, '...') }}</p>
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
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
                    <span>andang1503@gmail.com</span>
                </div>
                {{-- <div class="col-md-5 col-10 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/fb.png') }}" alt="Facebook" width="26" class="me-2">
                    <span>bagaskara</span>
                </div> --}}
                <div class="col-md-5 col-10 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/wa.png') }}" alt="WhatsApp" width="32" class="me-2">
                    <a href="https://wa.me/+6282237011039" target="_blank" class="text-decoration-none text-dark" >Admin Ika (082237011039)</a>
                </div>
                <div class="col-md-5 col-10 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/wa.png') }}" alt="WhatsApp" width="32" class="me-2">
                    <a href="https://wa.me/+6285725741404" target="_blank" class="text-decoration-none text-dark">Admin Widya (085725741404)</a>
                </div>
                
                <div class="col-md-5 col-10 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/Instagram.png') }}" alt="Instagram" width="26" class="me-2">
                    <span>@bagaskarafurniture</span>
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