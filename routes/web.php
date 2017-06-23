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

Route::get('/', 'EmailsController@index')->name('home');
Route::get('/users', 'UsersController@index')->name('users');

Route::get('/send-email', 'EmailsController@create')->name('email.create');
Route::post('/send-email', 'EmailsController@store')->name('email.store');

Route::get('/users/{id}', 'UsersController@show')->name('users.single');


