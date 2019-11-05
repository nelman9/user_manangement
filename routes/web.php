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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('home.destroy/{id}', 'HomeController@destroy')->name('home.destroy');
Route::delete('home.destroy/{id}', 'HomeController@destroy');
Route::get('user.edit/{id}', 'HomeController@edit')->name('user.edit');
Route::patch('user.update/{user}', 'HomeController@update')->name('user.update');


Route::resource('product','ProductController');
Route::get('product.index','ProductController@index')->name('product.index');
Route::get('product.create', 'ProductController@create')->name('product.create');
Route::post('product.store', 'ProductController@store')->name('product.store');
Route::post('product.destroy/{product}', 'ProductController@destroy')->name('product.destroy');
Route::delete('product.destroy/{product}', 'ProductController@destroy');





Auth::routes();

