<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Admin::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $admins = $query->latest()->paginate(10);
        return view('admin.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.admins.index')->with('success', 'Admin berhasil ditambahkan.');
    }
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.admins.show', compact('admin'));
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        return redirect()->route('admin.admins.index')->with('success', 'Admin berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        // Prevent deleting self (optional but good practice)
        if (auth()->guard('admin')->check() && auth()->guard('admin')->id() == $admin->id) {
            return redirect()->route('admin.admins.index')->with('error', 'Anda tidak dapat menghapus akun sendiri.');
        }

        $admin->delete();

        return redirect()->route('admin.admins.index')->with('success', 'Admin berhasil dihapus.');
    }
}
