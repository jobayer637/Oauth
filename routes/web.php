<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

// Auth::routes(['verify' => 'true']);
Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/google', 'GoogleLoginController@redirectToGoogle');
Route::get('auth/google/callback', 'GoogleLoginController@handleGoogleCallback');


Route::get('auth/github', 'GithubLoginController@redirectToGithub');
Route::get('auth/github/callback', 'GithubLoginController@handleGithubCallback');

Route::get('auth/facebook', 'FacebookLoginController@redirectToFacebook');
Route::get('auth/facebook/callback', 'FacebookLoginController@handleFacebookCallback');
