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

Route::group(['middleware' => 'web'], function () {
    Route::post('/register', 'Auth\RegisterController@register');
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/cart/add_to_cart', 'ProductsController@addToCart');
    Route::get('/cart/delete_from_cart', 'ProductsController@deleteFromCart');
});

Route::get('/create_product', 'ProductsController@create');
Route::post('/create_product', 'ProductsController@store');

Route::get('/{category}', 'ProductsController@showCategory')->where('category', 'pizza|sushi|drinks|sausages');
Route::get('/{category}/{id}', 'ProductsController@show')->where('category', 'pizza|sushi|drinks|sausages');


// User routes
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/user/profile', 'UserController@show');
    Route::patch('/user/profile/update', 'UserController@updateProfile');
    Route::patch('/user/profile/update_password', 'UserController@updatePassword');
    Route::post('/user/profile/update_avatar', 'UserController@updateAvatar');
    Route::post('/user/buy', 'ProductsController@buyProducts');
});

// Admin routes
Route::get('/admin', function() {
    return view('admin.adminDashboard');
});



