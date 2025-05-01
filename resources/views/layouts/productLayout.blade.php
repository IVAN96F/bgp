<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
</head>
<body>
    <!-- Header -->

    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center">
            <img src="{{ asset('img/BGP.png') }}" alt="Logo" height="40">

            <!-- Form Pencarian -->
            <form action="{{ route('search') }}" method="GET" class="input-group w-50">
                <input type="text" name="query" class="form-control" placeholder="Cari produk..." value="{{ request('query') }}">
                <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
            </form>

            <a href="{{ route('favorites.index') }}">
                <i class="bi bi-star-fill text-warning fs-3"></i>
            </a>
            
        </div>
    </div>
    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

        <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <div class="sidebar-content">
            <ul class="list-unstyled">
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Kategori</a></li>
                <li><a href="#">Promo</a></li>
                <li><a href="#">Kontak</a></li>
                <li><a href="{{ route('profile') }}">Profile</a></li>
                <li><a href="{{ route('artikel') }}">Artikel</a></li>

            </ul>
        </div>
    </div>

    <div class="custom-shape-divider-top">
        <svg
          data-name="Layer 1"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 1200 120"
          preserveAspectRatio="none"
        >
          <path
            d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
            class="shape-fill"
          ></path>
        </svg>
    </div>
    <footer class="footer py-5">
    <div class="container text-white" style="margin-top: 50px;">
        <div class="row">
        <div class="col-md-4">
            <h5 class="brand">market<span class="text-danger">iva</span>.</h5>
            <p class="small">
            All content on this website is protected by copyright and may not
            be used without permission from Marketiva.
            </p>
            <div class="social-icons">
            <a href="#" class="me-2"
                ><img src="instagram-icon.png" alt="Instagram" width="24"
            /></a>
            <a href="#" class="me-2"
                ><img src="facebook-icon.png" alt="Facebook" width="24"
            /></a>
            <a href="#"
                ><img src="twitter-icon.png" alt="Twitter" width="24"
            /></a>
            </div>
        </div>
        <div class="col-md-2">
            <h6 class="fw-bold">Company</h6>
            <ul class="list-unstyled">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Our Services</a></li>
            <li><a href="#">Our Projects</a></li>
            <li><a href="#">Blog & Updates</a></li>
            </ul>
        </div>
        <div class="col-md-2">
            <h6 class="fw-bold">Links</h6>
            <ul class="list-unstyled">
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Testimonials</a></li>
            <li><a href="#">Recent Work</a></li>
            <li><a href="#">Features</a></li>
            </ul>
        </div>
        <div class="col-md-4">
            <h6 class="fw-bold">Contact</h6>
            <p class="small">📞 +123 456 7890</p>
            <p class="small">📧 info@marketiva.com</p>
            <p class="small">📍 123 Main St. Suite 100, Anytown, USA</p>
        </div>
        </div>
        <div class="text-center mt-4">
        <button
            onclick="scrollToTop()"
            class="btn btn-light rounded-circle back-to-top"
        >
            ⬆
        </button>
        <p class="small mt-3">&copy; 2023 Marketiva. All Rights Reserved.</p>
        </div>
    </div>
    </footer>

    <!-- Navbar -->
    <div class="navbar">
        <a href="{{ url('/') }}"><i class="bi bi-house-door-fill"></i></a>
        <div class="logo">
            <img src="{{ asset('img/BGP.png') }}" alt="Logo" style="border-radius: 50%">
        </div>
        <a href="#" id="menu-icon"><i class="bi bi-list"></i></a>
    </div>
    <script type="module" src="https://unpkg.com/@google/model-viewer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        document.getElementById('menu-icon').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>
