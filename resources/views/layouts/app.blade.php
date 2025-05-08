<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Maven Pro' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            display: flex;
            height: 120vh;
            font-family: 'Maven Pro';
        }
        #sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            transition: width 0.3s ease;
            overflow-x: hidden;
            min-height: 120vh;
        }
        #sidebar.hidden {
            width: 0;
            padding: 0;
        }
        #content {
            flex-grow: 1;
            transition: margin-left 0.3s ease;
            padding: 20px;
            width: 100%;
        }
        .sidebar-link {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }
        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .toggle-btn {
            border: none;
            background: none;
            font-size: 1.5rem;
            color: white;
        }

        .sidebar-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            font-weight: bold;
            color: #ffc107 !important;
            padding-left: 1rem;
            padding-right: 1rem;
            margin-left: -1rem;
            margin-right: -1rem;
            border-radius: 0;
        }
        .sidebar-link i {
            margin-right: 10px;
        }

        .toggle-btn {
            border: none;
            background: none;
            font-size: 1.5rem;
            color: #000;
        }
        #sidebar.hidden {
            width: 0;
            padding: 0;
            overflow: hidden;
            visibility: hidden;
        }


    </style>
</head>
<body>

    <!-- Sidebar -->
    <div id="sidebar" class="d-flex flex-column p-3">

            <h4 class="mb-4">Admin Panel</h4>

        <ul class="nav flex-column">
            <li>
                <a class="sidebar-link {{ request()->routeIs('admin.dashboard.index') ? 'active' : '' }}" 
                   href="{{ route('admin.dashboard.index') }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>
            <li>
                <a class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" 
                   href="{{ route('admin.products.index') }}">
                    <i class="bi bi-box-seam"></i> Products
                </a>
            </li>
            <li>
                <a class="sidebar-link {{ request()->routeIs('admin.category.*') ? 'active' : '' }}" 
                   href="{{ route('admin.category.index') }}">
                    <i class="bi bi-tags"></i> Categories
                </a>
            </li>
            <li>
                <a class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" 
                   href="{{ route('admin.users.index') }}">
                    <i class="bi bi-people"></i> Users
                </a>
            </li>
            <li>
                <a class="sidebar-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}" 
                   href="{{ route('admin.articles.index') }}">
                    <i class="bi bi-journal-text"></i> Posts
                </a>
            </li>
            <li>
                <a class="sidebar-link {{ request()->routeIs('admin.promos.*') ? 'active' : '' }}" 
                   href="{{ route('admin.promos.index') }}">
                    <i class="bi bi-megaphone"></i> Promo
                </a>
            </li>
        </ul>
        
    </div>

    <!-- Main Content -->
    <div id="content">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                 <!-- Hamburger icon di kiri -->
                 <button id="toggleSidebar" class="toggle-btn me-3">
                    <i class="bi bi-list text-dark"></i>
                </button>
                <div class="ms-auto">
                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                           
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                Selamat Datang, {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ url('/') }}">Home</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            @yield('content')
        </div>
    </div>

    @yield('scripts')

    <script>
            const toggleBtn = document.getElementById('toggleSidebar');
            const sidebar = document.getElementById('sidebar');
            const icon = toggleBtn.querySelector('i');

            // Cek apakah sudah pernah dibuka sebelumnya
            const hasVisited = localStorage.getItem('hasVisited');

            // Jika belum, sembunyikan sidebar dan set ke localStorage
            if (!hasVisited) {
                sidebar.classList.add('hidden');
                icon.classList.remove('bi-x');
                icon.classList.add('bi-list');
                localStorage.setItem('hasVisited', 'true');
            } else {
                icon.classList.remove('bi-list');
                icon.classList.add('bi-x');
            }

            toggleBtn.addEventListener('click', function () {
                sidebar.classList.toggle('hidden');
                if (sidebar.classList.contains('hidden')) {
                    icon.classList.remove('bi-x');
                    icon.classList.add('bi-list');
                } else {
                    icon.classList.remove('bi-list');
                    icon.classList.add('bi-x');
                }
            });
      </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
