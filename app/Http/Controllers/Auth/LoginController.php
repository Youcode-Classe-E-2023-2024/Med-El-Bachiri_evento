<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            if (Auth::user()->getRoleNames()->first() === 'Admin') {
                return redirect('/dashboard');
            }
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->with('error', 'Invalid credentials');
    }
}
