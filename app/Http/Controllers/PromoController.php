<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller {
    public function index() {
        $promos = Promo::latest()->get();
        return view('admin.promos.index', compact('promos'));
    }

    public function create() {
        return view('admin.promos.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Simpan gambar ke storage
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/promos');
            $imagePath = str_replace('public/', '', $imagePath); // Hapus 'public/' untuk akses mudah
        } else {
            return back()->withErrors(['image' => 'Gagal upload gambar!']);
        }
    
        // Simpan ke database
        $promo = Promo::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath, // Pastikan ini masuk
        ]);
    
        // dd($promo); // Debug untuk memastikan gambar tersimpan
    
        return redirect()->route('admin.promos.index')->with('success', 'Promo berhasil ditambahkan.');
    }


    public function edit(Promo $promo) {
        return view('admin.promos.edit', compact('promo'));
    }

    public function update(Request $request, Promo $promo) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Jika ada gambar baru, hapus yang lama dan simpan yang baru
        if ($request->hasFile('image')) {
            if ($promo->image && Storage::exists('public/' . $promo->image)) {
                Storage::delete('public/' . $promo->image); // Hapus gambar lama
            }
            $imagePath = $request->file('image')->store('public/promos');
            $imagePath = str_replace('public/', '', $imagePath); // Buat path lebih bersih
        } else {
            $imagePath = $promo->image; // Pakai gambar lama
        }
    
        // Update data promo
        $promo->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath
        ]);
    
        return redirect()->route('admin.promos.index')->with('success', 'Promo berhasil diperbarui');
    }
    

    public function destroy(Promo $promo) {
        // Hapus gambar jika bukan gambar default
        if ($promo->image && Storage::exists('public/' . $promo->image)) {
            Storage::delete('public/' . $promo->image);
        }
    
        $promo->delete();
    
        return redirect()->route('admin.promos.index')->with('success', 'Promo berhasil dihapus');
    }
    
}
