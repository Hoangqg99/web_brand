<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Mail\TestMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $user = $request->user();
        $details = [
            'title' => 'Subject: Heartfelt Gratitude for Your Continued Loyalty Dear You',
            'send' => 'Dear You',
            'body' => '     I trust this letter finds you well. It is with immense pleasure that I extend my sincere appreciation for
                your steadfast
                loyalty and unwavering support to [Your Company Name]. Your commitment to our brand has been truly
                inspiring, and we are
                genuinely grateful to have you as a valued member of our community.

                Once again, thank you for choosing [Your Company Name]. We look forward to many more years of
                collaboration and serving
                your needs. Your loyalty is the cornerstone of our success.

                Best Regards,',
        ];
        Mail::to($user->email)->send(new TestMail($details));
        // return redirect()->noContent();
        return redirect()->back()->with('success', "You have an email sent to you");

    }

    public function forgotpassword()
    {
        return view('auth.forgot');
    }

    public function PostForgotPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', "Please check your email and reset your password");
        } else {
            return redirect()->back()->with('error', "Email not found in the system");
        }
    }

    public function mail($remember_token)
    {
        $user = User::getTokenSingle($remember_token);
        if (!empty($user)) {
            $data['user'] = $user;
            return view('auth.reset', $data);
        } else {
            abort(404);
        }
        view('auth.forgot');
    }

    public function PostMail($token, Request $request)
    {
        if ($request->password == $request->cpassword) {
            $user = User::getTokenSingle($token); 
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();
            return redirect('login')->with('success', "Password successfully reset");
        } else {
            return redirect()->back()->with('error', "Password and confirm password does not match");
        }
    }
}