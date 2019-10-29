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

Route::get('/charts', 'ChartController@index' )->name('charts.index');
Route::get('/charts/{chart}', 'ChartController@show' )->name('charts.show');

/* RESTful routing to Cylinder controller */
Route::resource('cylinders', 'CylinderController');
Route::post('/cylinders/chart/{cylinder}', 'ChartController@create')->name('charts.create');

/* RESTful routing to Gas controller */
Route::resource('gases', 'GasController')->parameters(['gases' => 'gas']);
    
    
