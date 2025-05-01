<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite Product</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        
        .profile-card {
            background-color: #F9C46E;
            padding: 20px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-card img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        .favorite-item {
            display: flex;
            align-items: center;
            background-color: #F9C46E;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 10px;
            transition: all 0.3s ease-in-out;
            text-decoration: none;
            position: relative;
        }

        .favorite-item:hover {
            transform: scale(1.05);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            background-color: #f7b947;
        }

        .favorite-item img {
            width: 60px;
            height: 80px;
            border-radius: 10px;
            background-color: #ccc;
            object-fit: cover;
        }

        .item-info {
            flex-grow: 1;
            margin-left: 10px;
        }

        .item-title {
            font-size: 16px;
            font-weight: bold;
            color: #d27800;
        }

        .item-desc {
            font-size: 12px;
            color: #555;
        }

        .item-price {
            font-size: 14px;
            font-weight: bold;
            color: #fff;
        }

        .delete-favorite {
            position: absolute;
            top: 10px;
            right: 10px;
            color: red;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container mt-3">
    <a href="{{ url()->previous() }}" class="text-dark text-decoration-none d-flex align-items-center">
        <span class="fs-4 me-2">&#8592;</span> Kembali
    </a>

    <div class="profile-card mt-3">
        @if (Auth::user()->profile_photo_path == null)
            <img src="{{ asset('img/profile.png') }}" alt="Profile Picture"
        style="width: 60px; height: 60px; border-radius: 50%;" />
        @else
            <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Profile" class="rounded-circle">
        @endif
        <p class="m-0 text-white fs-5">Halo {{ $greeting }}, {{ $user->name }}</p>
    </div>
    
    <h5 class="mt-3 fw-bold">Produk Favorite Kamu</h5>

    @foreach($favorites as $favorite)
    <div class="card mb-3 shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="row g-0 align-items-center">
            <div class="col-md-3 text-center p-2">
                <img src="{{ asset('storage/' . ($favorite->product->images->first()->image_path ?? 'default.jpg')) }}" 
                     alt="Product" 
                     class="img-fluid rounded-3" 
                     style="max-height: 120px; object-fit: cover;">
            </div>
            <div class="col-md-7">
                <div class="card-body py-3">
                    <h5 class="card-title mb-1">
                        <a href="{{ route('product.show', $favorite->product->id) }}" 
                           class="text-dark text-decoration-none fw-semibold">
                            {{ $favorite->product->name }}
                        </a>
                    </h5>
                    <p class="card-text text-muted mb-1" style="font-size: 0.9rem;">
                        {{ Str::limit($favorite->product->description, 60) }}
                    </p>
                    <p class="card-text fw-bold text-success">
                        Rp. {{ number_format($favorite->product->price, 0, ',', '.') }}
                    </p>
                </div>
            </div>
            <div class="col-md-2 text-end pe-3">
                <form action="{{ route('favorite.destroy', $favorite->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle" title="Hapus dari Favorit">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div> 
    @endforeach
</div>

</body>
</html>
