<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();
            $finduser = User::where('google_id', $user->id)->first();

            // dd($user);

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->route('home');
            } else {
                $rand = Str::random(20);
                $type = "@gmail.com";
                $mail = $rand . $type;

                $newUser = new User();
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                // $newUser->email = $mail;
                $newUser->google_id = $user->id;
                $newUser->password = Hash::make($rand);
                $newUser->avatar = $user->avatar;
                $newUser->save();

                Auth::login($newUser);

                return redirect()->route('home');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
