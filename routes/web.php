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


Route::get('/', 'FilialsController@index');

Route::resource('filials', 'FilialsController');

Route::resource('positions', 'PositionsController');

Route::resource('workers', 'WorkersController');

Route::post('setfilial', 'FilialsController@setUserFilial');