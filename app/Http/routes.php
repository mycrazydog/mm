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


Route::get('admin', function () {
    return view('default');
});


Route::group(array('prefix' => 'admin'), function () {

	# Post Management
	Route::group(array('prefix' => 'posts'), function () {
		
		Route::get('/', array('as' => 'posts', 'uses' => 'PostsController@index'));
	    
	    Route::get('create', array('as' => 'create/post', 'uses' => 'PostsController@create'));
	    Route::post('create', 'Controllers\PostsController@postCreate');
	    
	    Route::get('{blogId}/edit', array('as' => 'update/post', 'uses' => 'PostsController@getEdit'));
	    Route::post('{blogId}/edit', 'PostsController@postEdit');
	   
	    Route::get('{blogId}/delete', array('as' => 'delete/post', 'uses' => 'PostsController@getDelete'));
	    Route::get('{blogId}/confirm-delete', array('as' => 'confirm-delete/post', 'uses' => 'Controllers\Admin\PostsController@getModalDelete'));
	    Route::get('{blogId}/restore', array('as' => 'restore/post', 'uses' => 'PostsController@getRestore'));
	});

    # Dashboard
    Route::get('/', array('as' => 'admin', 'uses' => 'DashboardController@getIndex'));

});

Route::get('test', 'TestController@index');

Route::get('/', function () {
    return view('default');
});

