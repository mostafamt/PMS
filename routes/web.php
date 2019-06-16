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

Route::get('project/create' , 'ProjectController@create');
Route::post('project/create' , 'ProjectController@store');

Route::get('project/index' , 'ProjectController@index');

Route::get('project/{slug?}/edit' , 'ProjectController@edit');
Route::post('project/{slug?}/edit' , 'ProjectController@destroy');

Route::get('project/{slug?}/update' , 'ProjectController@update');
Route::post('project/{slug?}/update' , 'ProjectController@save');



