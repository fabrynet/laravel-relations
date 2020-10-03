<?php

use Illuminate\Support\Facades\Route;

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
}) -> name('welcome');

// Employee Index
Route::get('/employees', 'EmployeeController@index') -> name('employees.index');

// Employee Show
Route::get('/employees/{id}/show', 'EmployeeController@show') -> name('employees.show');

// Employee Create
Route::get('/employees/create', 'EmployeeController@create') -> name('employees.create');
Route::post('/employees/store', 'EmployeeController@store') -> name('employees.store');

// Employee Edit
Route::get('/employees/{id}/edit', 'EmployeeController@edit') -> name('employees.edit');
Route::put('/employees/{id}/update', 'EmployeeController@update') -> name('employees.update');

// Employee Delete
Route::delete('/employees/{id}/destroy', 'EmployeeController@destroy') -> name('employees.destroy');

// Employee tasks
Route::post('/employees/{id}/assigntask', 'EmployeeController@assignTask') -> name('employees.assigntask');
Route::delete('/employees/{id}/unassigntask', 'EmployeeController@unassignTask') -> name('employees.unassigntask');
