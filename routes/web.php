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

/* Rutas loginController */
Route::post('/','loginController@ingresar')->name('ingresar');
Route::get('/cerrar','loginController@cerrarsesion')->name('cerrarsesion');
Route::post('/registro','loginController@registrar')->name('registrousuario');
Route::get('/nuevacuenta','loginController@nuevacuenta')->name('nuevacuenta');


/* Rutas homeController */
Route::get('/index', 'HomeController@index')->name('index');

/* Rutas cuentasController */
Route::get('/cuentas', 'cuentasController@index')->name('cuentas');
Route::post('/ingresarCuenta','cuentasController@ingresarCuenta')->name('ingresarCuenta');

/* Rutas ingresosController */
Route::get('/ingresos', 'ingresosController@index')->name('ingresos');

/* Rutas egresosController */
Route::get('/egresos', 'egresosController@index')->name('egresos');

/* Rutas opcionesController */
Route::get('/opciones', 'opcionesController@index')->name('opciones');
Route::post('/balance', 'opcionesController@nuevobalance')->name('nuevobalance');

/* Rutas estadisticasController */
Route::get('/estadisticas', 'estadisticasController@index')->name('estadisticas');
