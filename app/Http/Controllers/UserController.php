<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update_role(Request $request)
    {
        $user = User::find($request->user_id);
        if ($user->getRoleNames()->first() === 'Admin') {
            return back()->with('error', 'For safety, you can not update your role as an Admin !!!');
        }
        $validatedData = $request->validate([
            'role' => 'required|in:Admin,Organizer,User',
        ]);

        $user->syncRoles([$validatedData['role']]);
        return back()->with('success', 'User role updated successfully');
    }

    public function delete_user(Request $request)
    {
        $user = User::find($request->user_id);
        $user->delete();
        return back()->with('success', 'User deleted successfully !!!');
    }
}
