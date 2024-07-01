<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm() {
        return view('login');
    }
    public function login(Request $request){
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->has('remember_me');

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            // Authentication passed, redirect to the home page
            return redirect()->intended('home')->with('success', 'You are logged in!');
        } else {
            // Authentication failed, redirect back to the login form with an error message
            return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput($request->only('email', 'remember_me'));
        }
    }

     public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
