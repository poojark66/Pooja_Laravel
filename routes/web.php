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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create', function () {
    return view('blogs/create');
});
Route::post('/store', array('as' => 'store', 'uses' => 'BlogController@store'));
Route::get('/index', array('as' => 'index', 'uses' => 'BlogController@index'));
Route::get('/show/{id}', array('as' => 'show', 'uses' => 'BlogController@show'));
Route::get('/edit/{id}', array('as' => 'edit', 'uses' => 'BlogController@edit'));
Route::post('/update/{id}', array('as' => 'update', 'uses' => 'BlogController@update'));
