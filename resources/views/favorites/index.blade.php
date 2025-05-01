<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite Product</title>
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

        .favorite-item {
            background-color: #F9C46E;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 10px;
            transition: all 0.3s ease-in-out;
        }

        .favorite-item:hover {
            transform: scale(1.02);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }

        .item-image {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            object-fit: cover;
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


        @media (max-width: 576px) {
    .action-buttons {
        flex-direction: row;
        justify-content: space-between;
        width: 100%;
        gap: 8px;
    }
}
    </style>
</head>
<body>

<div class="container mt-3">
    <a href="{{ url('/') }}" class="text-dark text-decoration-none d-flex align-items-center">
        <span class="fs-4 me-2">&#8592;</span> Back
    </a>

    <div class="profile-card mt-3">
        @if (Auth::user()->profile_photo_path == null)
            <img src="{{ asset('img/profile.png') }}" alt="Profile Picture"
                 style="width: 60px; height: 60px; border-radius: 50%;" />
        @else
            <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Profile" class="rounded-circle" width="60" height="60">
        @endif
        <p class="m-0 text-white fs-5">Halo {{ $greeting }}, {{ $user->name }}</p>
    </div>

    <h5 class="mt-3 fw-bold">It’s Your Favorite</h5>

    @foreach($favorites as $favorite)
        <div class="favorite-item d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
            <div class="d-flex align-items-start">
                <img src="{{ asset('storage/' . ($favorite->product->images->first()->image_path ?? 'default.jpg')) }}" alt="Product" class="item-image me-3">
                <div>
                    <p class="item-title mb-1">{{ $favorite->product->name }}</p>
                    <p class="item-desc mb-1">{{ Str::limit($favorite->product->description, 50) }}</p>
                    <p class="item-price mb-0">Rp. {{ number_format($favorite->product->price, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="action-buttons d-flex flex-md-column align-items-md-end ms-md-3 mt-3 mt-md-0 justify-content-between gap-2 flex-column">
                <a href="{{ route('redirect.gmail') }}" target="_blank" class="btn btn-primary btn-sm me-2 me-md-0 w-100">
                    Order by Email
                </a>
                <form action="{{ route('favorite.destroy', $favorite->id) }}" method="POST" onsubmit="return confirmDelete();">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger w-100">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </div>
            
        </div>
    @endforeach
</div>

<script>
    function confirmDelete() {
        return confirm("Apakah kamu yakin ingin menghapus item ini dari favorit?");
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
