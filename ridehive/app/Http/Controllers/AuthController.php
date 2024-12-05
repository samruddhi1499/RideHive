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
    
            $user = Auth::user(); // Get the authenticated user

            // Store user-specific data in session
        $request->session()->put('user_id', $user->user_id);
        $request->session()->put('role', $user->role);
    
            // Redirect based on role
            if ($user->role === 'Admin') {
                return redirect('/admin/users'); // Admin landing page
            } elseif ($user->role === 'Vendor') {
                return redirect('/vendor/vehicles'); // Vendor landing page
            } else {
                return redirect('/dashboard'); // User landing page
            }
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

    public function register(Request $request)
    {
        // Validate Input
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'contact' => 'nullable|string|max:255',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:User,Vendor', // Validate role selection
        ]);
    
        // Create User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Save selected role
            'status' => 'Pending',
        ]);
    
        // Automatically log in the user after registration
        Auth::login($user);

         // Redirect to Login Page with Success Message
         return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    
    }
    

}
