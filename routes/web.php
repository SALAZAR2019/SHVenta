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
//vista solo master
Route::view('master','layout.master');

//rutas a las vistas
Route::view('diario','crud');
Route::view('detalle','detalle');
Route::view('productos','crudprod');

Route::view('perfil','usuario');
Route::view('log','login');
Route::view('reg','registro');

//vista apis
Route::apiResource('apiusu','ApiUsuarioController');
Route::apiResource('apidia','ApiCrudDiarioController');
Route::apiResource('apipro','ApiProductoController');
Route::apiResource('apiven','ApiVendedorController');

//rutas para validar y salir
Route::post('login','AccesoController@validar');
Route::get('logout','AccesoController@salir');

//rutas necesarias para ventas
Route::get('getRutas/{id}', [
	'as' => 'getRutas',
	'uses' => 'ApiVendedorController@getRutas',
]);
Route::apiResource('apiProducto','ApiProductoController');
Route::apiResource('apiVenta','ApiVentaController');