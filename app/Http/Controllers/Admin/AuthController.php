<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // Generate captcha penjumlahan sederhana
        $a = rand(1, 10);
        $b = rand(1, 10);
        session(['captcha_result' => $a + $b]);
        session(['captcha_question' => "$a + $b = ?"]);
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Validasi captcha
        $request->validate([
            'captcha' => ['required', 'numeric'],
        ], [
            'captcha.required' => 'Captcha harus diisi.',
            'captcha.numeric' => 'Captcha harus berupa angka.',
        ]);
        if ((int) $request->captcha !== (int) session('captcha_result')) {
            // Generate ulang captcha jika salah
            $a = rand(1, 10);
            $b = rand(1, 10);
            session(['captcha_result' => $a + $b]);
            session(['captcha_question' => "$a + $b = ?"]);
            return back()->withErrors(['captcha' => 'Jawaban captcha salah.'])->withInput($request->except('password'));
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $admin = \App\Models\Admin::where('email', $credentials['email'])->first();
        if (!$admin) {
            return back()->withErrors([
                'email' => 'Email yang Anda masukkan tidak terdaftar.',
            ])->withInput($request->only('email'));
        }

        if (!\Hash::check($credentials['password'], $admin->password)) {
            return back()->withErrors([
                'password' => 'Password yang Anda masukkan salah.',
            ])->withInput($request->only('email'));
        }

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email_password' => 'Email dan password yang Anda masukkan salah.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
