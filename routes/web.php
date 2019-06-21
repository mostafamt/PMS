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

Route::get('/profile', function () {
    return view('profile');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Projects
Route::get('project/create' , 'ProjectController@create');
Route::post('project/create' , 'ProjectController@store');

Route::get('project/index' , 'ProjectController@index')->name('project.index');

Route::get('project/{id?}/edit' , 'ProjectController@edit')->name('project.show');
Route::post('project/{id?}/edit' , 'ProjectController@destroy');

Route::get('project/{id?}/update' , 'ProjectController@update');
Route::post('project/{id?}/update' , 'ProjectController@save');

// Tasks
Route::get('project/{id?}/task/create' , 'TaskController@create');
Route::post('project/{id?}/task/create' , 'TaskController@store');

Route::get('project/{project_id?}/task/{task_id?}/edit' , 'TaskController@edit');

//add super visor
Route::get('/task/{id}/Addsupervisor' , 'TaskController@addsupervisor')->name('addsupervisor');
Route::put('/task/{id}/Addsupervisor' , 'TaskController@savesupervisor')->name('savesupervisor');


// Members
Route::get('members' , 'MemberController@index');

// Departments
Route::get('department/create' , 'DepartmentController@create');
Route::post('department/create' , 'DepartmentController@store');

Route::get('departments' , 'DepartmentController@index');

Route::get('department/{slug?}/edit' , 'DepartmentController@edit');
Route::post('department/{slug?}/edit' , 'DepartmentController@destory');

Route::get('department/{slug?}/update' , 'DepartmentController@update');
Route::post('department/{slug?}/update' , 'DepartmentController@save');



// subtask
Route::get('subtask/{id}/create' , 'subtaskController@create')->name('subtask.create');
Route::post('subtask/{id}/store' , 'subtaskController@store')->name('subtask.store');



