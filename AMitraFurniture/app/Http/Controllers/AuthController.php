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

        // USER LOGIN (PAKAI VIEW YANG ADA)
        return view('admin.login');
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
        return view('admin.login'); // aman
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        return redirect()->route('home');
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
