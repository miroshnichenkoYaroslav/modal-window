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

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/page1', 'HomeController@page1');
    Route::get('/page2', 'HomeController@page2');
});

Route::get('/users', 'UserController@index');
Route::get('/home', 'HomeController@index')->name('home');
