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
        $roles = ['admin', 'user']; // Gunakan array biasa, bukan dari DB
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:admin,user'
        ]);

        $user = User::findOrFail($id);
        $user->update(['role' => $request->role]);

        return redirect()->route('admin.users.index')->with('success', 'Role berhasil diperbarui');
    }

}
