<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role; // Tambahkan ini di atas
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
        $roles = Role::all(); // Ambil semua role
        return view('admin.users.edit', compact('user', 'roles'));
    }
    


    
    public function update(Request $request, User $user) {
        $request->validate(['role_id' => 'required|exists:roles,id']);
    
        $user->update(['role_id' => $request->role_id]);
    
        return redirect()->route('admin.users.index')->with('success', 'Role berhasil diperbarui');
    }
    
}
