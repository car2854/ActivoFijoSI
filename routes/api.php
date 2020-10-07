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

//--------------- MI PARTE WE ---------------------
// Gestionar usuario
Route::resource('UsuarioMovil','UsuarioMovilController');
Route::post('Login','UsuarioMovilController@login');
// Depreciacion
Route::get('Depreciacion', 'DepreciacionMovilController@index');
//--------------------------------------------------

// --------------David----------------------
Route::get('listarCustodio', 'EmpleadoController@listarcustodio'); 
Route::get('listarResponsable', 'EmpleadoController@listarResponsable');
Route::get('listarOperador', 'EmpleadoController@listarOperador');

//----------------CARLOS ALBERTO----------------------

//Bitacora
Route::get('Bitacora','Log_ChangeController@ApiGetBitacora');

// RevisionTecnica
Route::get('Baja','BajaController@ApiGetBaja');
Route::get('Mantenimiento','MantenimientoController@ApiGetMantenimiento');
Route::get('Revaluo','RevaluoController@ApiGetRevaluo');

//Tranferencia
Route::get('Tranferencia','TranferenciaController@ApiGetBaja');
//----------------------------------
Route::apiResource('CategoriaMovil','CategoriaMovilController');
Route::apiResource('BienMovil','BienMovilController');

// Route::resource('UbicacionMovil','UbicacionMovilController');
// Route::resource('DepartamentoMovil','DepartamentoMovilController');
// Route::resource('RubroMovil','RubroMovilController');
// Route::resource('BienMovil','BienMovilController');
// Route::resource('DetalleBienMovil','DetalleBienMovilController');
// Route::resource('BajaBienMovil','BajaBienMovilController');
// Route::resource('MantenimientoMovil','MantenimientoMovilController');
// Route::resource('ResponsableMovil','ResponsableMovilController');
// Route::resource('CustodioMovil','CustodioMovilController');
// Route::resource('OperadorMovil','OperadorMovilController');
// Route::resource('ProveedorMovil','ProveedorMovilController');
// Route::resource('RevaluoMovil','RevaluoMovilController');
// Route::resource('DepartamentoGetMovil','DepartamentoGetMovilController');
// Route::resource('AlmacenMovil','AlmacenMovilController');
// Route::resource('CategoriaMovil','CategoriaMovilController');
