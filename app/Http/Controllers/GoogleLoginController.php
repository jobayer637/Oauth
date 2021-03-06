<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Socialite;
// use Auth;
// use Exception;
// use App\User;


use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

                return redirect('/home');
            } else {

                $newUser = new User();
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->github_id = $user->id;
                $newUser->password = Hash::make('11111111');
                $newUser->avatar = $user->avatar;
                $newUser->save();

                Auth::login($newUser);

                return redirect('/home');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
