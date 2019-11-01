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



Route::get('/', function () {
    return view('welcome');
});
*/



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('home.destroy/{id}', 'HomeController@destroy')->name('home.destroy');
Route::delete('home.destroy/{id}', 'HomeController@destroy');
Route::get('user.edit/{id}', 'HomeController@edit')->name('user.edit');
Route::patch('user.update/{user}', 'HomeController@update')->name('user.update');




Auth::routes();

