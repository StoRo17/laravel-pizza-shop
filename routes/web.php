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
Route::get('/{category}', 'ProductsController@showCategory');
Route::get('/{category}/{id}', 'ProductsController@show');

Route::post('/create_product', 'ProductsController@store');
