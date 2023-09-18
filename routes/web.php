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


// Main pages
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

// Profile
Route::get('id','ProfileController@index');
Route::get('id/{id}','ProfileController@show');
Route::get('setting','ProfileController@edit');
Route::post('id','ProfileController@update');

// Auth
Auth::routes();

Route::post('search','SearchController@search');
Route::get('search','ProfileController@index');
Route::get('companies','SearchController@index');
Route::get('companies/{id}','SearchController@show');

Route::post('support/{id}','ProfileController@support');