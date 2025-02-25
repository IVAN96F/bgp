<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller {
    // Menambah produk ke favorite
    public function addToFavorite(Request $request) {
        if (!Auth::check()) {
            return response()->json(['error' => 'Anda harus login untuk menambahkan favorit.'], 401);
        }

        $user = Auth::user();
        $productId = $request->product_id;

        $favorite = Favorite::where('user_id', $user->id)->where('product_id', $productId)->first();
        
        if ($favorite) {
            return response()->json(['message' => 'Produk sudah ada di favorit.']);
        }

        Favorite::create([
            'user_id' => $user->id,
            'product_id' => $productId
        ]);

        return response()->json(['message' => 'Produk berhasil ditambahkan ke favorit!']);
    }

    // Menampilkan halaman favorit
    public function index()
    {
        $user = Auth::user();
        $favorites = Favorite::where('user_id', $user->id)->get();

        $hour = Carbon::now()->hour;

        if ($hour >= 5 && $hour < 12) {
            $greeting = 'Selamat Pagi';
        } elseif ($hour >= 12 && $hour < 15) {
            $greeting = 'Selamat Siang';
        } elseif ($hour >= 15 && $hour < 18) {
            $greeting = 'Selamat Sore';
        } elseif ($hour >= 18 && $hour <= 23) {
            $greeting = 'Selamat Malam';
        } else { // Jika jam 00:00 - 04:59
            $greeting = 'Selamat Malam';
        }
        

        return view('favorites.index', compact('favorites', 'greeting', 'user'));
    }

    // Menghapus produk dari favorit
    public function destroy($id)
    {
        $favorite = Favorite::find($id);
        
        if (!$favorite) {
            return redirect()->route('favorites.index')->with('error', 'Produk tidak ditemukan dalam favorit.');
        }

        $favorite->delete();

        return redirect()->route('favorites.index')->with('success', 'Produk berhasil dihapus dari favorit.');
    }

}

