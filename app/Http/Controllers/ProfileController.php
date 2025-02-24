<?php

// use Illuminate\Support\Facades\Route;

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile', [
            'user' => Auth::user() // Mengambil data user yang sedang login
        ]);
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = User::find(Auth::id());

        if (!$user) {
            return back()->with('error', 'Pengguna tidak ditemukan.');
        }

        // Hapus foto lama jika ada
        if ($user->profile_photo_path) {
            Storage::delete('public/' . $user->profile_photo_path);
        }

        // Simpan foto baru
        $path = $request->file('profile_photo')->store('profile_photos', 'public');

        // Update data user
        $user->profile_photo_path = $path;
        $user->save(); // Simpan perubahan

        return back()->with('success', 'Foto profil berhasil diperbarui.');
    }

    public function edit()
    {
        return view('profile_edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        // Ambil user yang sedang login
        $user = Auth::user(); // Pastikan ini adalah instance model User

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Pastikan $user adalah model User
        if (!$user instanceof User) {
            return back()->with('error', 'User tidak ditemukan.');
        }

        // Update data user
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Simpan perubahan
        $user->save(); // << Pastikan ini tidak error

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}
