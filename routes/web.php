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

Route::get('/', [
    'uses' => 'EmailsController@index',
    'as' => 'home'
    ]);
Route::get('/users', [
    'uses' => 'UsersController@index',
    'as' => 'users'
    ]);
Route::get('/send-email', [
    'uses'=> 'EmailsController@create',
    'as' => 'email.create'
    ]);
Route::post('/send-email', [
    'uses' => 'EmailsController@store',
    'as' => 'email.store'
    ]);
Route::get('/users/{id}', [
    'uses' => 'UsersController@show',
    'as' => 'users.single'
    ]);


