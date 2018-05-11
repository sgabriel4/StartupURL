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

Route::get('/', 'MainController@showLinks');
Route::get('/create', 'MainController@showForm');
Route::post('/create', 'MainController@createLink');
Route::get('/{codigo}', 'MainController@redirect');
