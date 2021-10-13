<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('faq', 'Api\FaqController@index');

Route::middleware('auth:api')->namespace('Api\Profile')->group(function(){
    Route::post('profile', 'HomeController@index');

    Route::post('profile/avatar-update', 'UserController@updateAvatar');
    Route::post('profile/email-update', 'UserController@updateEmail');
    Route::post('profile/password-update', 'UserController@updatePassword');
    Route::post('profile/name-update', 'UserController@updateName');
});

Route::namespace('Api\Auth')->group(function(){
    Route::post('register', 'RegisterController@register');
    Route::post('login', 'LoginController@login');

});

Route::get('test', 'TestController@index')->middleware('auth:api');


