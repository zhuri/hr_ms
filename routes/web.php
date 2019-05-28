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

Route::get('/users', 'UserController@index')->name('users.list');
Route::get('/users/create', 'UserController@create')->name('users.create');
Route::get('/users/{id}', 'UserController@show')->name('users.get');
Route::post('/users/destroy/{id}', 'UserController@destroy')->name('users.destroy');


Route::get('/tasks', 'TaskController@index')->name('tasks.list');
Route::get('/tasks/{id}', 'TaskController@show')->name('tasks.get');
Route::get('/recruitments', 'RecruitmentController@index')->name('recruitments.list');
Route::get('/vacations', 'VacationController@index')->name('vacations.list');
Route::get('/payrolls', 'PayrollController@index')->name('payrolls.list');
Route::get('/departments', 'DepartmentController@index')->name('departments.list');
