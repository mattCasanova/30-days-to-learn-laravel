<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Attempt to authenticate the user (you would typically check the credentials against the database)
        // if (Auth::attempt($request->only('email', 'password'))) {
        //     return redirect('/')->with('success', 'Login successful!');
        // }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
}
