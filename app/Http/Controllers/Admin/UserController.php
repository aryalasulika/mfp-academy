<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Admin: list
    public function index(Request $request)
    {
        $query = User::query();

        // Search by name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by role
        if ($request->filled('role_filter')) {
            $query->where('role', $request->role_filter);
        }

        $users = $query->orderBy('created_at', 'desc')->get();
        
        return view('admin.user.index', compact('users'));
    }

    // Admin: create form
    public function create()
    {
        return view('admin.user.create');
    }

    // Admin: store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'alamat' => 'nullable|string',
            'nomor_hp' => 'nullable|string|max:20',
            'role' => 'required|in:peserta,coach',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'nomor_hp' => $request->nomor_hp,
            'password' => Hash::make('password123'), // Default password
            'role' => $request->role,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan.');
    }

    // Admin: edit form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    // Admin: update
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'alamat' => 'nullable|string',
            'nomor_hp' => 'nullable|string|max:20',
            'role' => 'required|in:peserta,coach',
        ]);

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'nomor_hp' => $request->nomor_hp,
            'role' => $request->role,
        ];

        $user->update($updateData);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil diupdate.');
    }

    // Admin: delete
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus.');
    }
}
