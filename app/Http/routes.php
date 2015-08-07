<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//php artisan route:list

Route::get('admin', function () {
    return view('default');
});


Route::group(array('prefix' => 'admin'), function () {

	Route::resource('posts', 'PostsController');

});

Route::get('test', 'TestController@index');

Route::get('/', function () {
    return view('default');
});

