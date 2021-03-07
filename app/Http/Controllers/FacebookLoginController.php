<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FacebookLoginController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function handleFacebookCallback()
    {
        // $user = Socialite::driver('facebook')->stateless()->user();
        // dd($user);
        try {

            $user = Socialite::driver('facebook')->stateless()->user();
            $finduser = User::where('facebook_id', $user->id)->first();

            // dd($user);

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->route('home');
            } else {

                $newUser = new User();
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->facebook_id = $user->id;
                $newUser->password = Hash::make('11111111');
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
