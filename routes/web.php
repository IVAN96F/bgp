<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/search', [ProductController::class, 'search'])->name('search');
// Route::get('/register', function () {
//     return view('auth.register');
// });

// Auth
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/category/{id}', [ProductController::class, 'category'])->name('category');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update-photo', [ProfileController::class, 'updatePhoto'])->name('profile.updatePhoto');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    // Favorite
    Route::post('/favorite/add', [FavoriteController::class, 'addToFavorite'])->name('favorite.add');
    Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::delete('/favorite/{id}', [FavoriteController::class, 'destroy'])->name('favorite.destroy');
});

// Promo
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('promos', PromoController::class);
});



// ProductAdmin
Route::middleware(['admin', 'auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', AdminProductController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});
Route::delete('/admin/products/delete-image/{id}', [AdminProductController::class, 'deleteImage']);

// // Artikel Admin
// Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
//     Route::resource('articles', AdminArticleController::class)->names('admin.articles');
// });

// Articles
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
    Route::resource('articles', AdminArticleController::class)->names('admin.articles');
});

Route::get('/artikel/{id}', [ArticleController::class, 'show'])->name('articles.show');

// Route::get('/admin/articles/{article}/edit', [ArticleController::class, 'edit'])->name('admin.articles.edit');

// CategoryAdmin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Dahsboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    // User
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');

    // Category
    Route::get('/category', [AdminCategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/category/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
    Route::get('/category/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/category/{id}/update', [AdminCategoryController::class, 'update'])->name('admin.category.update');
    Route::post('/category/store', [AdminCategoryController::class, 'store'])->name('admin.category.store');
    Route::delete('/category/{id}/delete', [AdminCategoryController::class, 'destroy'])->name('admin.category.destroy');
});

// Article List
Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel');

// Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');