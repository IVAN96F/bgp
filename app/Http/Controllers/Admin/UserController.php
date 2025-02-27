<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Pastikan semua role diambil
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id) // Perbaikan: Gunakan ID, bukan model binding
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id'
        ]);

        $user = User::findOrFail($id); // Ambil user berdasarkan ID
        $user->update(['role_id' => $request->role_id]);

        return redirect()->route('admin.users.index')->with('success', 'Role berhasil diperbarui');
    }
}
