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
Route::get('/editarCuenta/{id}', 'cuentasController@editarCuenta')->name('editarCuenta');
Route::post('/actualizarCuenta', 'cuentasController@actualizarCuenta')->name('actualizarCuenta');
Route::get('/nuevaCuenta', 'cuentasController@nuevaCuenta')->name('nuevaCuenta');
Route::post('/cuentaNueva', 'cuentasController@cuentaNueva')->name('cuentaNueva');
Route::get('/eliminarCuenta/{id}', 'cuentasController@eliminarCuenta')->name('eliminarCuenta');

/* Rutas ingresosController */

Route::get('/ingresos', 'ingresosController@index')->name('ingresos');
Route::get('/nuevoIngreso', 'ingresosController@nuevoIngreso')->name('nuevoIngreso');
Route::post('/modificarIngreso', 'ingresosController@modificarIngreso')->name('modificarIngreso');
Route::post('/ingresarIngreso', 'ingresosController@ingresarIngreso')->name('ingresarIngreso');
Route::get('/eliminarIngreso/{id}', 'ingresosController@eliminarIngreso')->name('eliminarIngreso');
Route::get('/editarIngreso/{id}', 'ingresosController@editarIngreso')->name('editarIngreso');


/* Rutas egresosController */
Route::get('/egresos', 'egresosController@index')->name('egresos');
Route::get('/nuevoEgreso', 'egresosController@nuevoEgreso')->name('nuevoEgreso');
Route::post('/ingresarEgreso', 'egresosController@ingresarEgreso')->name('ingresarEgreso');
Route::get('/editarEgreso/{id}', 'egresosController@editarEgreso')->name('editarEgreso');
Route::post('/modificarEgreso', 'egresosController@modificarEgreso')->name('modificarEgreso');
Route::get('/eliminarEgreso/{id}', 'egresosController@eliminarEgreso')->name('eliminarEgreso');

/* Rutas opcionesController */
Route::get('/opciones', 'opcionesController@index')->name('opciones');
Route::post('/balance', 'opcionesController@nuevobalance')->name('nuevobalance');
Route::post('/nuevacontra', 'opcionesController@nuevacontra')->name('nuevacontra');

/* Rutas estadisticasController */
Route::get('/estadisticas', 'estadisticasController@index')->name('estadisticas');
