<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        // Attempt to authenticate the user (you would typically check the credentials against the database)
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }

        request()->session()->regenerate();
        return redirect('/jobs')->with('success', 'Login successful!');
    }

    public function destroy(Request $request)
    {
        // Log the user out (you would typically use Auth::logout())
        Auth::logout();
        return redirect('/')->with('success', 'Logged out successfully!');
    }
}
