<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            height: 120vh;
        }
        #sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            transition: width 0.3s ease;
            overflow-x: hidden;
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
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div id="sidebar" class="d-flex flex-column p-3">
        <h4 class="text-center">Admin Panel</h4>
        <ul class="nav flex-column">
            <li><a class="sidebar-link" href="#">Dashboard</a></li>
            <li><a class="sidebar-link" href="{{ route('admin.products.index') }}">Products</a></li>
            <li><a class="sidebar-link" href="{{ route('admin.category.index') }}">Categories</a></li>
            <li><a class="sidebar-link" href="{{ route('admin.users.index') }}">Users</a></li>
            <li><a class="sidebar-link" href="{{ route('admin.articles.index') }}">Posts</a></li>
            <li><a class="sidebar-link" href="{{ route('admin.promos.index') }}">Promo</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div id="content">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">                            
                <div class="ms-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                Selamat Datang, {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
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

    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('hidden');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
