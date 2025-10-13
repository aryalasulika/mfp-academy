<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

        // Filter by kelompok usia
        if ($request->filled('kelompok_usia_filter')) {
            $query->where(function($q) use ($request) {
                $q->where(function($subQ) use ($request) {
                    // For peserta: check kelompok_usia
                    $subQ->where('role', 'peserta')
                         ->where('kelompok_usia', $request->kelompok_usia_filter);
                })->orWhere(function($subQ) use ($request) {
                    // For coach: check kelompok_usia_asuhan
                    $subQ->where('role', 'coach')
                         ->where('kelompok_usia_asuhan', $request->kelompok_usia_filter);
                });
            });
        }

        // Sorting functionality
        $sort = $request->get('sort', 'created_at');
        $direction = $request->get('direction', 'desc');
        
        // Valid sort columns to prevent SQL injection
        $validSorts = ['name', 'email', 'alamat', 'nomor_hp', 'role', 'created_at'];
        $sort = in_array($sort, $validSorts) ? $sort : 'created_at';
        $direction = in_array($direction, ['asc', 'desc']) ? $direction : 'desc';

        $users = $query->orderBy($sort, $direction)->get();
        
        return view('admin.user.index', compact('users', 'sort', 'direction'));
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
            'kelompok_usia' => 'nullable|in:U-10,U-12,U-13',
            'posisi' => 'nullable|in:Kiper,Bek,Gelandang,Penyerang',
            'kelompok_usia_asuhan' => 'nullable|in:U-10,U-12,U-13',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'nomor_hp' => $request->nomor_hp,
            'password' => Hash::make('password123'), // Default password
            'role' => $request->role,
        ];

        // Handle role-specific fields
        if ($request->role === 'peserta') {
            $userData['kelompok_usia'] = $request->kelompok_usia;
            $userData['posisi'] = $request->posisi;
        } elseif ($request->role === 'coach') {
            $userData['kelompok_usia_asuhan'] = $request->kelompok_usia_asuhan;
        }

        // Handle file upload
        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('profile_photos', $fileName, 'public');
            $userData['foto_profil'] = $filePath;
        }

        User::create($userData);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan.');
    }

    // Admin: edit form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    // Admin: show detail
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
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
            'kelompok_usia' => 'nullable|in:U-10,U-12,U-13',
            'posisi' => 'nullable|in:Kiper,Bek,Gelandang,Penyerang',
            'kelompok_usia_asuhan' => 'nullable|in:U-10,U-12,U-13',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'nomor_hp' => $request->nomor_hp,
            'role' => $request->role,
        ];

        // Handle role-specific fields
        if ($request->role === 'peserta') {
            $updateData['kelompok_usia'] = $request->kelompok_usia;
            $updateData['posisi'] = $request->posisi;
            // Clear coach-specific fields
            $updateData['kelompok_usia_asuhan'] = null;
        } elseif ($request->role === 'coach') {
            $updateData['kelompok_usia_asuhan'] = $request->kelompok_usia_asuhan;
            // Clear peserta-specific fields
            $updateData['kelompok_usia'] = null;
            $updateData['posisi'] = null;
        }

        // Handle file upload
        if ($request->hasFile('foto_profil')) {
            // Delete old photo if exists
            if ($user->foto_profil && \Storage::disk('public')->exists($user->foto_profil)) {
                \Storage::disk('public')->delete($user->foto_profil);
            }
            
            $file = $request->file('foto_profil');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('profile_photos', $fileName, 'public');
            $updateData['foto_profil'] = $filePath;
        }

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
