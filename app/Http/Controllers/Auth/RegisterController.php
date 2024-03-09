<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
//        dd($request->button);
        $request->validate([
            'name' => 'required|string|min:4|max:100',
            'email' => 'required|email|unique:users|max:255|ends_with:gmail.com',
            'password' => 'required|string|min:8'
        ]);
        $usrCount = count(User::all());
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        Auth::login($user);

        if ($usrCount === 0) {
            $user->assignRole('Admin');
            return redirect('/dashboard');
        } elseif ($request->button === 'User') {
            $user->assignRole('User');
        } elseif ($request->button === 'Organizer') {
            $user->assignRole('Organizer');
        }

        return redirect('/');
    }
}
