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
    return view('login');
})->name('/');

Route::get('/index', 'HomeController@index')->name('index');

Route::get('/cuentas', 'cuentasController@index')->name('cuentas');

Route::get('/ingresos', 'ingresosController@index')->name('ingresos');

Route::get('/egresos', 'egresosController@index')->name('egresos');

Route::get('/opciones', 'opcionesController@index')->name('opciones');

Route::get('/estadisticas', 'estadisticasController@index')->name('estadisticas');
