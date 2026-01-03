<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // -----------------------
    // Show register form
    // -----------------------
    public function showRegisterForm()
    {
        return view('frontend.auth.register');
    }

    // -----------------------
    // Process registration
    // -----------------------
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'], // needs password_confirmation
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Automatically log in user
        Auth::guard('web')->login($user);

        return redirect()->route('frontend.home')->with('success', 'Registration successful!');
    }

    // -----------------------
    // Show login form (frontend)
    // -----------------------
    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    // -----------------------
    // Process login for both Admin and User
    // -----------------------
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 1️⃣ Check Admin first
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        // 2️⃣ Check normal user
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('frontend.home'));
        }

        // 3️⃣ Neither matched → show login again with error
        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    // -----------------------
    // Logout
    // -----------------------
    public function logout(Request $request)
    {
        // Logout based on guard
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } else {
            Auth::guard('web')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to frontend login
        return redirect()->route('user.login')->with('success', 'Logged out successfully!');
    }
}
