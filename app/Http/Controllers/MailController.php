<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $user = $request->user();
        $details = [
            'title' => 'Mail from Shop Surfside Media',
            'body' => 'This is for testing mail using gmail.'
        ];
        Mail::to($user->email)->send(new TestMail($details));
        return view('user.index');
    }
}
