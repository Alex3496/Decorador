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

Route::get('/', function(){
	return view ('index');
})->name('index');

Route::get('/caja', 'CajaController@index')->name('caja.index');

Route::post('/caja', 'CajaController@add')->name('caja.add');

Route::post('/caja/pay', 'CajaController@store')->name('caja.store');

Route::get('recibo', 'CajaController@exportPDF')->name('pdf');

Route::get('database','DBController@index')->name('DB.index');

Route::get('prueba','DBController@prueba')->name('DB.prueba');

Route::post('sendEmail','DBController@store')->name('DB.sendEmail');
