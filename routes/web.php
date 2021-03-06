<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/google', 'GoogleLoginController@redirectToGoogle');
Route::get('auth/google/callback', 'GoogleLoginController@handleGoogleCallback');


Route::get('auth/github', 'GithubLoginController@redirectToGithub');
Route::get('auth/github/callback', 'GithubLoginController@handleGithubCallback');