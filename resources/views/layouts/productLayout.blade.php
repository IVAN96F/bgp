<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title')</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
        />
        
    </head>
    <body>
        <!-- Header -->

        <div class="container mt-3">
            <div class="d-flex justify-content-between align-items-center">
                <img src="{{ asset('img/BGP.png') }}" alt="Logo" height="40" />

                <!-- Form Pencarian -->
                <form
                    action="{{ route('search') }}"
                    method="GET"
                    class="input-group w-50"
                >
                    <input
                        type="text"
                        name="query"
                        class="form-control"
                        placeholder="Cari produk..."
                        value="{{ request('query') }}"
                    />
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>

                {{--
                <a href="{{ route('favorites.index') }}">
                    <i class="bi bi-star-fill text-warning fs-3"></i>
                </a>
                --}}
                <div class="dropdown">
                    @auth
                        <a href="{{ route('profile') }}" class="d-flex align-items-center text-decoration-none text-dark">
                            <img
                                src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('img/profile.png') }}"
                                alt="profile"
                                width="32"
                                height="32"
                                class="rounded-circle me-2"
                            />
                            <strong>{{ Auth::user()->name }}</strong>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                    @endauth
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="container mt-4">@yield('content')</div>

        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <div class="sidebar-content">
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/#kategori') }}">Kategori</a></li>
                    <li><a href="#">Kontak</a></li>
                    <li><a href="{{ route('profile') }}">Profile</a></li>
                    <li><a href="{{ route('artikel') }}">News</a></li>
                </ul>
            </div>
        </div>
        <div class="navbar">
            <a href="{{ url('/') }}"><i class="bi bi-house-door-fill"></i></a>
            <div class="logo">
                <img src="{{ asset('img/BGP.png') }}" alt="Logo" style="border-radius: 50%">
            </div>
            <a href="#" id="menu-icon"><i class="bi bi-list"></i></a>
        </div>
        {{-- footer --}}
        
        <footer class="footer mt-5">
            <div class="container">
                <div class="row justify-content-center g-3">
                    <h3>Our Contact</h3>
                    <!-- WhatsApp Admin Widya -->
                    <div class="col-md-5 col-10 d-flex align-items-center justify-content-center">
                        <a href="https://wa.me/+6285725741404" target="_blank"  class="text-white">
                            <i class="bi bi-whatsapp" style="font-size: 25px;"></i>
                        </a>
                        <span>Admin Widya: <a href="https://wa.me/+6285725741404" target="_blank" class="text-white">wa.me/+6285725741404</a></span>
                    </div>
                    <!-- WhatsApp Admin Ika -->
                    <div class="col-md-5 col-10 d-flex align-items-center justify-content-center">
                        <a href="https://wa.me/+6282237011039" target="_blank" class="text-white">
                            <i class="bi bi-whatsapp" style="font-size: 25px;"></i>
                        </a>
                        <span>Admin Ika: <a href="https://wa.me/+6282237011039" target="_blank" class="text-white" >wa.me/+6282237011039</a></span>
                    </div>
                    <!-- Email -->
                    <div class="col-md-5 col-10 d-flex align-items-center justify-content-center" class="text-white">
                        <i class="bi bi-envelope" style="font-size: 25px;"></i>
                        <span><a href="mailto:andang1503@gmail.com" class="text-white"> andang1503@gmail.com</a></span>
                    </div>
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/bagaskarafurniture" target="_blank" class="text-white">
                        <i class="bi bi-instagram" style="font-size: 26px;"></i> @bagaskarafurniture
                    </a>
                </div>
            </div>
            <p class="mt-5">&copy; 2025 Bagaskara Galih Perkasa. All rights reserved.</p>
            <p>
                Developed by
                <a href="https://example.com" target="_blank">UDINUS</a>
            </p>
            <!-- Contact Information -->
            
        </footer>
        

        <script>
            document.getElementById('menu-icon').addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('sidebar').classList.toggle('active');
            });
        </script>
        <script
            type="module"
            src="https://unpkg.com/@google/model-viewer"
        ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script
            type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
        ></script>
    </body>
</html>
