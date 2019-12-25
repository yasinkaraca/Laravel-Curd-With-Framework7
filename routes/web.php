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

Route::get('/', 'MainController@index');

Route::get('newForm', 'MainController@newForm');

Route::get('add', 'MainController@newStudent')->name('addStudent');

Route::get('delete/{no}', 'MainController@delete')->name('deleteStudent');

Route::get('save/{no}', 'MainController@update')->name('saveStudent');

Route::get('update/{no}', 'MainController@form')->name('updateForm');

Route::get('findStudents', 'MainController@searchResult');

Route::get('links', 'MainController@getLinks');
