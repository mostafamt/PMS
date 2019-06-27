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


Route::get('/test' , 'TestController@test');


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
Route::get('/members' , 'MemberController@index');
Route::get('/users/{username?}', 'MemberController@show' );


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

Route::get('subtask/{id?}/show' , 'subtaskController@show')->name('subtask_show');
Route::post('subtask/{id?}/show' , 'subtaskController@finish');


Route::get('subtask/{id}/userstask' , 'subtaskController@usertask')->name('subtask_user');
Route::post('subtask/{id}/saveUsersTask' , 'subtaskController@saveUserTask')->name('subtask_saveusertask');

Route::post('/task/{id}/running' , 'TaskController@Running')->name('Running');
Route::post('/subtask/{id}/running' , 'subtaskController@running')->name('subtask_running');


// Task navbar
Route::get('/tasks/{user_id?}' , 'TaskController@index');
//Subtask navbar
Route::get('/subtasks/{user_id?}' , 'subtaskController@index');





