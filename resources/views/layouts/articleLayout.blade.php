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
 




    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <div class="sidebar-content">
                <h5 class="text-white">Menu</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Kategori</a></li>
                    <li><a href="#">Promo</a></li>
                    <li><a href="#">Kontak</a></li>
                    <li><a href="{{ route('profile') }}">Profile</a></li>
                    <li><a href="{{ route('artikel') }}">Articles</a></li>
    
                </ul>
            </div>
        </div>
    
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
