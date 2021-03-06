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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*---------------------------Users----------------------------------------*/
Route::group(['prefix' => 'user'], function () {
    Route::get('/show', 'UserController@index');
    Route::get('/show/{user_id}', 'UserController@show');
    Route::post('/create', 'UserController@create');
});
