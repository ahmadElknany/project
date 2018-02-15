<?php

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

Route::get('login-email', 'Auth\Email\SessionController@create');
Route::post('login-email', 'Auth\Email\SessionController@store')->name('login-email');
Route::get('logout', 'Auth\Email\SessionController@destroy');

Route::get('auth/token/{token}', 'Auth\Email\LoginTokenController@show')->name('token.send');

Route::get('login/{provider}', 'Auth\Social\SocialLoginController@redirectToProvider')
            ->where(['provider' => 'github|facebook|google|twitter']);
Route::get('login/{provider}/callback', 'Auth\Social\SocialLoginController@handleProviderCallback')
            ->where(['provider' => 'github|facebook|google|twitter']);