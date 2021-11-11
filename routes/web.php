<?php

use Illuminate\Support\Facades\Route;


// Some temporary stuff... Will be deleted on Prod
if(app()->environment('local')){

    Route::get('parse', 'ParserController@index');

    Route::get('login', function(){
        echo 'Auth';
    })->name('login');

    Route::get('test', 'TestController@index');

    Route::get('/', function () {
        return view('welcome');
    });
}




