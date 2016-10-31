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
Route::get('/create_product', 'ProductsController@create');
Route::get('/{category}', 'ProductsController@showCategory');
Route::get('/{category}/{id}', 'ProductsController@show');

Route::post('/create_product', 'ProductsController@store');
