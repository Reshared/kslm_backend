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

Route::get('/', 'IndexController@index');
Route::get('filter', 'IndexController@filter');
Route::get('support', 'IndexController@support');
Route::get('cooperative', 'IndexController@cooperative');
Route::get('about', 'IndexController@about');
Route::get('contact', 'IndexController@contact');
Route::get('ajax/categories', 'AjaxController@getCategories');
Route::get('ajax/products', 'AjaxController@getProducts');

Route::get('filter/{id}', 'ContentController@filter');
Route::get('support/{id}', 'ContentController@support');
Route::get('cooperative/{id}', 'ContentController@cooperative');

Route::post('message', 'AjaxController@postMessage');