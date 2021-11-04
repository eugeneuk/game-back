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
Route::post('checkAuth', 'AuthController@check');

Route::get('get-games', 'Api\GameController@index');
Route::get('get-current-game/{game}', 'Api\GameController@show');

Route::get('get-types', 'Api\TaxonomyController@getTypes');

Route::get('products/show/{product}', 'Api\ProductController@show');
Route::get('products', 'Api\ProductController@index');
Route::get('filters', 'Api\FiltersController@search');

Route::middleware('auth:api')->namespace('Api')->group(function(){
    Route::post('profile', 'HomeController@index');

    Route::post('profile/avatar-update', 'Profile\UserController@updateAvatar');
    Route::post('profile/email-update', 'Profile\UserController@updateEmail');
    Route::post('profile/password-update', 'Profile\UserController@updatePassword');
    Route::post('profile/name-update', 'Profile\UserController@updateName');
    Route::post('me', 'Profile\UserController@me');

    ### PRODUCTS ###

    Route::get('profile/product', 'Profile\Product\ProductController@index');
    Route::get('profile/product/create/{game_id}', 'Profile\Product\ProductController@create');
    Route::get('profile/product/get-games', 'Profile\Product\ProductController@getGames');
    Route::post('profile/product/store', 'Profile\Product\ProductController@store');
    Route::get('profile/product/edit/{id}', 'Profile\Product\ProductController@edit');
    #
    Route::get('profile/taxonomy/get-types', 'TaxonomyController@getTypes');



});

Route::namespace('Api\Auth')->group(function(){
    Route::post('register', 'RegisterController@register');
    Route::post('login', 'LoginController@login');

});

Route::get('test', 'TestController@index')->middleware('auth:api');


