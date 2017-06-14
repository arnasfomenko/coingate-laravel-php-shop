<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ProductsController@index')->name('home');

Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');

Route::get('/login','SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout','SessionsController@destroy');

Route::get('/cart','CartController@show');
Route::get('/cart/{id}/add','CartController@add');
Route::get('/cart/destroy','CartController@destroy');

Route::get('/cart/checkout','CartController@getCheckout');
Route::post('/cart/checkout','CartController@CoinGate');
Route::post('/cart/callback', 'CartController@callback');
Route::get('/myorders', 'CartController@myOrders');
