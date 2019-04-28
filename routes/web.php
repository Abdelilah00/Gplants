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

Route::get('/','PagesController@index');
Route::get('cart','PagesController@cart');
Route::get('checkOut','PagesController@checkOut');

Route::get('products','ProductsController@index');
Route::get('products/{id}','ProductsController@show');

Route::get('filters','ProductsController@havingFilters');
Route::get('categorie/{categorieId}','ProductsController@havingCategorie');
Route::get('color/{colorId}','ProductsController@havingColor');

Route::resource('cart', 'CartController');

Route::post('command','CommandsController@store');