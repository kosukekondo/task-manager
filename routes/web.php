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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('tasks', 'TasksController');
    Route::put('tasks/{id}/duplicate', 'TasksController@duplicate')->name('tasks.duplicate');
    Route::post('tasks/search', 'TasksController@search')->name('tasks.search');
    Route::get('tasks/search/{id}', 'TasksController@specifiedterm')->name('tasks.specifiedterm');

    Route::resource('remainders', 'RemaindersController');
});