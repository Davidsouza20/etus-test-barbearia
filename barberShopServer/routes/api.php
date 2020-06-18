<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Employee
Route::get('/employee', 'EmployeeController@index');
Route::post('/employee', 'EmployeeController@create');
Route::get('/employee/{id}', 'EmployeeController@show');


//Client
Route::get('/client', 'ClientController@index');
Route::post('/client', 'ClientController@create');
Route::get('/client/{id}', 'ClientController@show');
Route::put('/client/{id}', 'ClientController@update');
Route::delete('/client/{id}', 'ClientController@delete');


//Service
Route::get('/service', 'ServiceController@index');
Route::post('/service', 'ServiceController@create');
Route::get('/service/{id}', 'ServiceController@show');
Route::put('/service/{id}', 'ServiceController@update');
Route::delete('/service/{id}', 'ServiceController@delete');