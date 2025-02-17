<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function change_password()
    {
        return view('user.change_password');
    }

    public function update_password(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users,email',
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8',
            'confirm_new_password' => 'required|same:new_password',
        ]);

        // Find the user by email
        $user = User::where('email', $validatedData['email'])->first();

        // Check if the old password matches the user's password
        if (!Hash::check($validatedData['old_password'], $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The old password does not match.']);
        }

        // Update the user's password
        $user->password = Hash::make($validatedData['new_password']);
        $user->save();

        // Return success message
        return redirect()->back()->with('success', 'Password updated successfully!');
    }
}
