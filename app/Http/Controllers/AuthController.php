<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $mailController;

    public function __construct(MailController $mailController)
    {
        $this->mailController = $mailController;
    }

    public function login(Request $request)
    {
        // Xác thực người dùng
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Gửi email thông báo đăng nhập
            $user = Auth::user();
            $this->mailController->sendLoginEmail($user);

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
