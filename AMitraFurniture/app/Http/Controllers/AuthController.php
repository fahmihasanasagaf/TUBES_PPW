<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // =======================
    // SHOW LOGIN FORM
    // =======================
    public function loginForm()
    {
        // ADMIN LOGIN
        if (request()->is('admin/*')) {
            return view('admin.login');
        }

        // USER LOGIN
        return view('dashboard.login');
    }

    // =======================
    // HANDLE LOGIN
    // =======================
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // ===== ADMIN LOGIN =====
        if ($request->is('admin/*')) {
            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'is_admin' => 1,
            ])) {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard');
            }

            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ]);
        }

        // ===== USER LOGIN =====
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // =======================
    // REGISTER
    // =======================
    public function registerForm()
    {
        // ADMIN REGISTER
        if (request()->is('admin/*')) {
            return view('admin.register');
        }

        // USER REGISTER
        return view('dashboard.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.max' => 'Nama maksimal 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        ]);

        // ===== ADMIN REGISTER =====
        if ($request->is('admin/*')) {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'is_admin' => 1, // Set as admin
            ]);

            Auth::login($user);
            return redirect()->route('admin.dashboard')->with('success', 'Akun admin berhasil dibuat!');
        }

        // ===== USER REGISTER =====
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        return redirect()->route('home')->with('success', 'Akun berhasil dibuat!');
    }

    // =======================
    // LOGOUT
    // =======================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
