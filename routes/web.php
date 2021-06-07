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
//Route::post('add','App\Http\Controllers\HomeController@store');

Route::resource('home','App\Http\Controllers\HomeController');
Route::get('estimation','App\Http\Controllers\EstimationController@index')->name('estimation');
//Route::resource('estimation','App\Http\Controllers\EstimationController');
Route::get('/{page}', 'App\Http\Controllers\AdminController@index');
Route::get('/', function () {
    return view('pages.index');
});
