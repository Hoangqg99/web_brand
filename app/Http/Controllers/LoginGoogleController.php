<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class LoginGoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
          
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
        
            $user = Socialite::driver('google')->stateless()->user();
            $finduser = User::where('google_id', $user->id)->first();
         
            if($finduser){
        //  tài khoản đã đăng nhập google 
                Auth::login($finduser);
                return redirect('/');
         
            }else{
                // Đăng kí tài khoản
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'google_id'=> $user->id,
                        'password' => Hash::make(Str::random(8))
                    ]);
         
                Auth::login($newUser);
        
                // return redirect()->intended('home');
                return redirect('/')->with('success', 'Login with google successfully');
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());

        }
    }
}