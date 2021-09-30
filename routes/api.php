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

Route::middleware('auth')->namespace('Api\Auth\Profile')->group(function(){
    Route::post('profile', 'HomeController@register');
});

Route::namespace('Api\Auth')->group(function(){
    Route::post('register', 'RegisterController@register');
    Route::post('login', 'LoginController@login');

});



