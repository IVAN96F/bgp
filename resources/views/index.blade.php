<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda BGP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
</head>
<body>
    <div class="container mt-3">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center">
            <img src="{{ asset('img/BGP.png') }}" alt="Logo" height="40">
            <div class="input-group w-50">
                <input type="text" class="form-control" placeholder="Cari produk...">
                <button class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>
            </div>
            <i class="bi bi-star-fill text-warning fs-3"></i>
        </div>
        </div>
    </nav>

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
    
</div>
<!--TERLARIS-->
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
    </div>

         <!--featured product-->
         <div class="container py-4">
            <h2 class="text-center mb-4">Our Featured Product</h2>
            <div class="row row-cols-2 row-cols-md-4 g-4 justify-content-center">
                <!-- Product 1 -->
                <a href="" class="text-decoration-none">
                    <div class="col d-flex justify-content-center hovered-card">
                        <div class="card text-center" style="width: 18rem;">
                            <img src="{{ asset('img/chair4.png') }}" class="card-img-top" alt="SOFA 1">
                            <div class="card-body">
                                <h5 class="mt-2 text-start" style="font-size: 18px">SOFA 1</h5>
                                <p class="text-start mb-1" style="font-size: 15px">Deskripsi singkat untuk sofa 1.</p>
                                {{-- <a href="product.html" class="btn btn-primary">Lihat Detail</a> --}}
                            </div>
                        </div>
                    </div>
                </a>
                
                
                <!-- Product 2 -->
                <a href="" class="text-decoration-none">
                    <div class="col d-flex justify-content-center hovered-card">
                        <div class="card text-center" style="width: 18rem;">
                            <img src="{{ asset('img/chair4.png') }}" class="card-img-top" alt="SOFA 1">
                            <div class="card-body">
                                <h5 class="mt-2 text-start" style="font-size: 18px">SOFA 1</h5>
                                <p class="text-start mb-1" style="font-size: 15px">Deskripsi singkat untuk sofa 1.</p>
                                {{-- <a href="product.html" class="btn btn-primary">Lihat Detail</a> --}}
                            </div>
                        </div>
                    </div>
                </a>
                
        
                <!-- Product 3 -->
                <a href="" class="text-decoration-none">
                    <div class="col d-flex justify-content-center hovered-card">
                        <div class="card text-center" style="width: 18rem;">
                            <img src="{{ asset('img/chair4.png') }}" class="card-img-top" alt="SOFA 1">
                            <div class="card-body">
                                <h5 class="mt-2 text-start" style="font-size: 18px">SOFA 1</h5>
                                <p class="text-start mb-1" style="font-size: 15px">Deskripsi singkat untuk sofa 1.</p>
                                {{-- <a href="product.html" class="btn btn-primary">Lihat Detail</a> --}}
                            </div>
                        </div>
                    </div>
                </a>
        
                <!-- Product 4 -->
                <a href="" class="text-decoration-none">
                    <div class="col d-flex justify-content-center hovered-card">
                        <div class="card text-center" style="width: 18rem;">
                            <img src="{{ asset('img/chair4.png') }}" class="card-img-top" alt="SOFA 1">
                            <div class="card-body">
                                <h5 class="mt-2 text-start" style="font-size: 18px">SOFA 1</h5>
                                <p class="text-start mb-1" style="font-size: 15px">Deskripsi singkat untuk sofa 1.</p>
                                {{-- <a href="product.html" class="btn btn-primary">Lihat Detail</a> --}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        
                <!--bagaskara news-->
    <div class="container py-5">
        <h3 class="text-center mt-4">bagaskara news</h3>
        <div class="row g-4">
            <a href="" class="text-decoration-none">
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
            <a href="" class="text-decoration-none">
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
    <section id="contact" class="text-center mt-5" style="margin-bottom: 7vh">
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

<!--footer-->
    <!-- header Bawah -->
    <!-- <div class="navbar">
        <a href="Iindex.html"><i class="bi bi-house-door-fill"></i></a>
        <div class="logo">
            <img src="pngwing.com.png" alt="Logo">
        </div>
        <a href="#"><i class="bi bi-list"></i></a>
    </div> -->
    <!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <div class="sidebar-content">
        <h5 class="text-white">Menu</h5>
        <ul class="list-unstyled">
            <li><a href="#">Home</a></li>
            <li><a href="#">Kategori</a></li>
            <li><a href="#">Promo</a></li>
            <li><a href="#">Kontak</a></li>
        </ul>
    </div>
</div>

<!-- Navbar -->
<div class="navbar">
    <a href="Iindex.html"><i class="bi bi-house-door-fill"></i></a>
    <div class="logo">
        <img src="pngwing.com.png" alt="Logo">
    </div>
    <a href="#" id="menu-icon"><i class="bi bi-list"></i></a>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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

        document.getElementById('menu-icon').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('sidebar').classList.toggle('active');
    });

    // Menutup sidebar jika klik di luar area sidebar
    document.addEventListener('click', function(event) {
        let sidebar = document.getElementById('sidebar');
        let menuIcon = document.getElementById('menu-icon');

        if (!sidebar.contains(event.target) && !menuIcon.contains(event.target)) {
            sidebar.classList.remove('active');
        }
    });
    </script>
</body>
</html>