@extends('layouts.app') {{-- Sesuaikan layoutnya --}}

@section('content')
<div class="container">
    <h3 class="mb-4">Dashboard Admin</h3>

    {{-- Kartu Statistik --}}
    <div class="row mb-4">
        {{-- Produk --}}
        <div class="col-md-3">
            <div class="card shadow-sm text-white bg-primary">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Produk</h5>
                    <h3 class="card-text">{{ $totalProducts }}</h3>
                </div>
                <a href="{{ route('admin.products.index') }}" class="text-primary text-decoration-none">
                    <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                        <span class="text-primary fw-bold">Detail</span>
                        <i class="bi bi-arrow-right-circle-fill"></i>
                    </div>
                </a>
            </div>
        </div>

        {{-- User --}}
        <div class="col-md-3">
            <div class="card shadow-sm text-white bg-success">
                <div class="card-body text-center">
                    <h5 class="card-title">Total User</h5>
                    <h3 class="card-text">{{ $totalUsers }}</h3>
                </div>
                <a href="{{ route('admin.users.index') }}" class="text-success text-decoration-none">
                    <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                        <span class="text-success fw-bold">Detail</span>
                        <i class="bi bi-arrow-right-circle-fill"></i>
                    </div>
                </a>
            </div>
        </div>

        {{-- Artikel --}}
        <div class="col-md-3">
            <div class="card shadow-sm text-white bg-warning">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Artikel</h5>
                    <h3 class="card-text">{{ $totalArticles }}</h3>
                </div>
                <a href="{{ route('admin.articles.index') }}" class="text-warning text-decoration-none">
                    <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                        <span class="text-warning fw-bold">Detail</span>
                        <i class="bi bi-arrow-right-circle-fill"></i>
                    </div>
                </a>
            </div>
        </div>

        {{-- Kategori --}}
        <div class="col-md-3">
            <div class="card shadow-sm text-white bg-danger">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Kategori</h5>
                    <h3 class="card-text">{{ $totalCategories }}</h3>
                </div>
                <a href="{{ route('admin.category.index') }}" class="text-danger text-decoration-none">
                    <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                        <span class="text-danger fw-bold">Detail</span>
                        <i class="bi bi-arrow-right-circle-fill"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>

    {{-- Grafik --}}
    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm p-3">
                <h5 class="mb-3">Produk Terfavorit</h5>
                <canvas id="favoriteChart" height="200"></canvas>
            </div>
        </div>

        <div class="col-md-4 mb-4 h-"> 
            <div class="card shadow-sm p-3">
                <h5 class="mb-3">User vs Artikel</h5>
                <canvas id="userArticleChart" height="200"></canvas>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Grafik Produk Terfavorit
    const ctxFav = document.getElementById('favoriteChart');
    if (ctxFav) {
        new Chart(ctxFav, {
            type: 'bar',
            data: {
                labels: {!! json_encode($productNames) !!},
                datasets: [{
                    label: 'Jumlah Favorit',
                    data: {!! json_encode($favoriteCounts) !!},
                    backgroundColor: '#FF6384'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    }

    // Grafik User vs Artikel
    const ctxUserArticle = document.getElementById('userArticleChart');
    if (ctxUserArticle) {
        new Chart(ctxUserArticle, {
            type: 'pie',
            data: {
                labels: ['Users', 'Artikel'],
                datasets: [{
                    label: 'Jumlah',
                    data: [{{ $totalUsers }}, {{ $totalArticles }}],
                    backgroundColor: ['#36A2EB', '#FFCE56']
                }]
            }
        });
    }
});
</script>
@endsection
