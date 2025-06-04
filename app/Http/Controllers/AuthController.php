<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display the login view.
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
            return redirect($role === 'peserta' ? '/dashboard/peserta' : '/dashboard/coach');
        }
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:peserta,coach',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        // Check if user exists with the given email
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return back()
                ->withErrors(['email' => 'Email tidak ditemukan dalam sistem.'])
                ->withInput($request->except('password'));
        }

        // Verify the role
        if ($user->role !== $request->role) {
            return back()
                ->withErrors(['role' => 'Peran yang Anda pilih tidak sesuai dengan akun Anda.'])
                ->withInput($request->except('password'));
        }

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => $request->role])) {
            $request->session()->regenerate();

            // Redirect to different dashboards based on role
            return redirect()->intended($request->role === 'peserta' ? '/dashboard/peserta' : '/dashboard/coach');
        }

        return back()
            ->withErrors(['password' => 'Email atau password yang Anda masukkan salah.'])
            ->withInput($request->except('password'));
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // Fungsi registrasi dihapus
}
