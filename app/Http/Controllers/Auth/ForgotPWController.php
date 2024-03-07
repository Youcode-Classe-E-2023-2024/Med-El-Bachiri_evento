<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Workbench\App\Models\User;

class ForgotPWController extends Controller
{
    public function index()
    {
        return view('pages.forgot_pw');
    }

    public function send_reset_link(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return redirect()->back()->with('success', 'Password reset link sent successfully!');
        } else {
            return redirect()->back()->withErrors(['email' => __($status)]);
        }
    }
}
