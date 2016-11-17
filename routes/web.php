<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'ProductsController@index');

Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm');

Route::post('/create_user', 'Auth\RegisterController@create');
Route::get('/create_product', 'ProductsController@create');
Route::post('/create_product', 'ProductsController@store');

Route::get('/{category}', 'ProductsController@showCategory')->where('category', 'pizza|sushi|drinks|sausages');
Route::get('/{category}/{id}', 'ProductsController@show')->where('category', 'pizza|sushi|drinks|sausages');


// User routes
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/user/profile', 'UserController@show');
});

// Admin routes
Route::get('/admin', function() {
    return view('admin.adminDashboard');
});
