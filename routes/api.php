<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('almacen/rubro', 'RubroController');


Route::resource('UbicacionMovil','UbicacionMovilController');
Route::resource('DepartamentoMovil','DepartamentoMovilController');
Route::resource('RubroMovil','RubroMovilController');
Route::resource('BienMovil','BienMovilController');
Route::resource('DetalleBienMovil','DetalleBienMovilController');

Route::resource('BajaBienMovil','BajaBienMovilController');

Route::resource('MantenimientoMovil','MantenimientoMovilController');

Route::resource('ResponsableMovil','ResponsableMovilController');
Route::resource('CustodioMovil','CustodioMovilController');
Route::resource('OperadorMovil','OperadorMovilController');
Route::resource('ProveedorMovil','ProveedorMovilController');
Route::resource('RevaluoMovil','RevaluoMovilController');
Route::resource('DepartamentoGetMovil','DepartamentoGetMovilController');

Route::resource('UsuarioMovil','UsuarioMovilController');
Route::get('Login','UsuarioMovilController@login');

Route::resource('AlmacenMovil','AlmacenMovilController');
Route::resource('CategoriaMovil','CategoriaMovilController');
