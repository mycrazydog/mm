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



/* OLD
Route::group(array( 'middleware' => 'sentinel.auth', 'prefix' => 'admin'), function () {
	Route::resource('posts', 'PostsController');
});

*/

//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);


/*
|--------------------------------------------------------------------------
| Authorization - signup, signin, logout, forgot-password
|--------------------------------------------------------------------------
|
|
|
|
*/

/*
NOT USEFUL
# Static Pages. Redirecting admin so admin cannot access these pages.
Route::group(['middleware' => ['redirectAdmin']], function() {
    Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getHome']);
    Route::get('about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);
    Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@getContact']);
});
*/

# Registration
Route::group(['middleware' => 'guest'], function() {
    Route::get('register', 'RegistrationController@create');
    Route::post('register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);
});

# Authentication
Route::get('login', ['as' => 'login', 'middleware' => 'guest', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController' , ['only' => ['create','store','destroy']]);

# Forgotten Password
Route::group(['middleware' => 'guest'], function() {
    Route::get('forgot_password', 'Auth\PasswordController@getEmail');
    Route::post('forgot_password','Auth\PasswordController@postEmail');
    Route::get('reset_password/{token}', 'Auth\PasswordController@getReset');
    Route::post('reset_password/{token}', 'Auth\PasswordController@postReset');
});

# Standard User Routes
Route::group(['middleware' => ['auth','standardUser']], function() {
    Route::get('userProtected', 'StandardUser\StandardUserController@getUserProtected');
    Route::resource('profiles', 'StandardUser\UsersController', ['only' => ['show', 'edit', 'update']]);
});

# Admin Routes
Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('admin', ['as' => 'admin_dashboard', 'uses' => 'Admin\AdminController@getHome']);
    Route::resource('admin/profiles', 'Admin\AdminUsersController');
});

# Authenticated Routes
Route::group(['middleware' => ['auth'], 'prefix' => 'manage'], function() {
    Route::resource('posts', 'PostsController');
    Route::resource('departments', 'DepartmentsController');
    Route::resource('sources', 'SourcesController');
});



Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getHome']);
//Route::get('about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);
//Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@getContact']);


