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

Route::get('/', function () {
   return redirect('/dashboard');
});


Route::get('dashboard', 'DashboardController@index');

Route::get('dashboard/search', 'SearchController@index')->name('search');

Route::get('dashboard/create', 'CreateController@index')->name('create');

Route::post('dashboard/search', 'SearchController@FindEmployee');

Route::post('dashboard/create', 'CreateController@SaveEmployee');

Route::get('dashboard/employee/{id}', 'EditController@index')->name('employee');

Route::post('dashboard/employee/edit/{id}', 'EditController@update')->name('edit');

Route::post('dashboard/employee/delete/{id}', 'EditController@delete')->name('delete');
