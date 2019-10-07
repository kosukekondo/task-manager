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
    Route::put('tasks/{id}/duplicate', 'TasksController@duplicate')->name('tasks.duplicate');
    Route::get('tasks/search/{id}', 'TasksController@specifiedterm')->name('tasks.specifiedterm');
    Route::get('tasks/staffedit/{id}', 'TasksController@staffedit')->name('tasks.staffedit');
    Route::put('tasks/staffupdate/{id}', 'TasksController@staffupdate')->name('tasks.staffupdate');
    Route::post('tasks/search', 'TasksController@search')->name('tasks.search');

    Route::resource('tasks', 'TasksController');

    Route::get('remainders/send', 'RemaindersController@send')->name('remainders.send');
    Route::resource('remainders', 'RemaindersController');

    Route::resource('companies', 'CompaniesController');

    Route::get('sales', 'SalesController@index')->name('sales.index');
    Route::post('sales/search', 'SalesController@search')->name('sales.search');
    Route::get('sales/search/{id}', 'SalesController@specifiedterm')->name('sales.specifiedterm');

    Route::resource('staff', 'StaffController');

    Route::get('invoices/search/{id}', 'InvoicesController@specifiedterm')->name('invoices.specifiedterm');
    Route::post('invoices/search', 'InvoicesController@search')->name('invoices.search');
    Route::get('invoices/edit/{id}', 'InvoicesController@edit')->name('invoices.edit');
    Route::get('invoices/update/{id}', 'InvoicesController@bsupdate')->name('invoices.bsupdate');
    Route::get('invoices/generatepdf', 'InvoicesController@generatepdf')->name('invoices.generatepdf');
    Route::get('invoices', 'InvoicesController@index')->name('invoices.index');
});