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
//Redirect Catch
Route::get('/home', function()
           {
               return redirect('/'); 
           });

//Show static education page
Route::get('/education', function()
           {
               return view('pages.education'); 
           });

//show main index page
Route::get('/', 'MainContentController@index');

//show pedestrian incedent map 
Route::get('incident', 'MainLoader@incident');

//user profile
Route::get('profile', 'MainLoader@profile');

// Browse by specific created at time or show tags 
Route::get('browse/new', 'MainContentController@shownew');
Route::get('browse/tags', 'MainContentController@btags');

//Main Content Resource
Route::resource('maincs', 'MainContentController');

// Authentication routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');