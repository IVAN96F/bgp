<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Maven Pro' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <style>
        body {
            font-family: 'Maven Pro';
            padding-bottom: 100px;
        }

        .profile-container {
            margin-top: 20px;
        }

        .profile-header {
            display: flex;
            align-items: center;
        }

        .profile-header .back-arrow {
            font-size: 24px;
            text-decoration: none;
            color: #333;
            margin-right: 10px;
        }

        .profile-info {
            margin-top: 20px;
        }

        .profile-picture {
            position: relative;
            display: inline-block;
        }

        .profile-picture img {
            border-radius: 50%;

        }

        .edit-icon button {
            position: absolute;
            bottom: 0;
            margin-left: 50px;
            background-color: #D6D6D6;
            border-radius: 50%;
            padding: 3px;
            align-items: center;
            transition: transform 0.5 ease;
        }

        .edit-icon button:hover {
            background-color: #b8b8b8;
            transform: scale(1.2);
        }

        .profile-info h4 {
            margin-top: 10px;
        }

        .profile-points {
            margin-top: 10px;
        }

        .profile-options {
            margin-top: 20px;
        }

        .profile-options .btn {
            margin-bottom: 10px;
            width: 100%;
        }

        .logout-button {
            margin-top: 20px;
            background-color: #f9C46E;
            border-radius: 15px 15px 15px 15px;
            padding: 15px;
        }

        .btn-profile {
            border-radius: 15px 15px 15px 15px;
            padding: 25px;
            background-color: #a4ba5425;
            display: block;
        }

        .text-profile {
            color: #f9C46E;
        }

        .icon-profile {
            margin-right: 5px;
        }

        .btn-profile:hover {
            background-color: white;
        }

        .btn-coin:hover {
            color: black;
        }

        .btn-logout:hover {
            color: white;
        }

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fff;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .spinner-container {
            position: relative;
        }

        .spinner-border {
            width: 5rem;
            height: 5rem;
        }

        .spinner-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 4rem;
            height: 4rem;
        }

        .countdown {
            display: flex;
            justify-content: center;
            gap: 20px;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .countdown div {
            color: black;
        }

        .countdown .time {
            font-size: 2rem;
            font-weight: bold;
        }

        .countdown .label {
            font-size: 1rem;
            margin-top: 5px;
        }

        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="profile-container">
            <div class="profile-header align-items-center">
                <a href="{{ route('home') }}" style="color:#f9C46E;"><i class="fa-solid fa-left-long fa-xl"></i></a>
                <h3 style="color: #f9C46E; margin-bottom: 0 !important; margin-left: 0.5em !important"><strong>Profil</strong></h3>
            </div>
            <div class="profile-info text-center">
                <div class="profile-picture">
                    {{-- @if (Auth::user()->profile_photo_path)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Profile Photo"
                            style="width: 250px;height: 250px;">
                    @else --}}
                        <img src="{{ asset('img/profile.png') }}" alt="Profile Picture"
                            style="width: 250px;height: 250px;" />
                    {{-- @endif --}}
                    <div class="edit-icon">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{ asset('img/pencil.png') }}" alt="Edit Icon" style=" width: 30px;" />
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Silahkan Upload Gambar</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="inputGroupFile02"
                                                name="profile_photo">
                                            <label class="input-group-text" for="inputGroupFile02">Unggah
                                                Gambar</label>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <h4><strong>{{ $user->ID_Sekari }}</strong></h4> --}}
                <h4><strong>Nama</strong></h4>
                {{-- <h4><strong>{{ $user->rombel }}</strong></h4> --}}
            </div>
            <div class="profile-options">
                <!-- Modal -->
                <a href="https://instagram.com/ppko_hmtiudinus" style="text-decoration: none;">
                    <button class=" btn-profile btn btn-outline-secondary btn-block" style="text-align: left;">
                        <span class="text-profile"><i class="fa fa-solid fa-phone fa-2xl icon-profile"
                                style="color: #f9C46E;"></i>Hubungi Kami</span>
                    </button>
                </a>

            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
              this.closest('form').submit();" class="btn-logout">
                    <div class="logout-button text-center">
                        <button class="btn" style="color:white; background:">Keluar</button>
                    </div>
                </a>
            </form>
        </div>
    </div>

    <div id="sidebar" class="sidebar">
        <div class="sidebar-content">
            <h5 class="text-white">Menu</h5>
            <ul class="list-unstyled">
                <li><a href="#">Home</a></li>
                <li><a href="#">Kategori</a></li>
                <li><a href="#">Promo</a></li>
                <li><a href="#">Kontak</a></li>
                <li><a href="#">Profile</a></li>
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

    <script>
        window.addEventListener('load', function() {
            document.getElementById('preloader').style.display = 'none';
        });
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script>
        document.getElementById('menu-icon').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>
</body>

</html>
