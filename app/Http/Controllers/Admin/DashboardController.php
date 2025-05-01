<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Article;
use App\Models\Product;
use App\Models\Category;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $totalArticles = Article::count();
        $totalFavorites = Favorite::count();
        $totalCategories = Category::count(); 

        // Ambil 5 produk terfavorit
        $topFavorit = Product::withCount('favorites')
                            ->orderBy('favorites_count', 'desc')
                            ->take(5)
                            ->get();

        // Ambil nama produk dan jumlah favorit
        $productNames = $topFavorit->pluck('name');
        $favoriteCounts = $topFavorit->pluck('favorites_count');

        return view('admin.dashboard.index', compact(
            'totalProducts',
            'totalUsers',
            'totalArticles',
            'totalFavorites',
            'productNames',
            'favoriteCounts',
            'totalCategories'
        ));
    }
}
