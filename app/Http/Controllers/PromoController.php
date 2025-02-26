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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->file('image')->store('promos', 'public');

        Promo::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.promos.index')->with('success', 'Promo berhasil ditambahkan');
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

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($promo->image);
            $imagePath = $request->file('image')->store('promos', 'public');
        } else {
            $imagePath = $promo->image;
        }

        $promo->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.promos.index')->with('success', 'Promo berhasil diperbarui');
    }

    public function destroy(Promo $promo) {
        Storage::disk('public')->delete($promo->image);
        $promo->delete();

        return redirect()->route('admin.promos.index')->with('success', 'Promo berhasil dihapus');
    }
}
