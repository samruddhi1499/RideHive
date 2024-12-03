<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Show Registration Form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle Registration
    public function register(Request $request)
    {
        // Validate Input
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'contact' => 'nullable|string|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create User
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact, // Save contact number (nullable)
            'password' => Hash::make($request->password),
            'role' => 'User', // Default role
            'status' => 'Pending', // Default status
        ]);

        // Redirect to Login Page with Success Message
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

}
