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


Route::apiResource('CategoriaMovil','CategoriaMovilController');
Route::apiResource('BienMovil','BienMovilController');

//----------------CARLOS ALBERTO----------------------

//Bitacora
Route::get('Bitacora','Log_ChangeController@ApiGetBitacora');

// RevisionTecnica
Route::get('Baja','BajaController@ApiGetBaja');
Route::post('Baja/create','BajaController@ApiPostBaja');
Route::get('Mantenimiento','MantenimientoController@ApiGetMantenimiento');
Route::post('Mantenimiento/create','MantenimientoController@ApiPostMantenimiento');
Route::get('Revaluo','RevaluoController@ApiGetRevaluo');
Route::post('Revaluo/create','RevaluoController@ApiPostRevaluo');
Route::get('RevisionTecnica','RevisionController@ApiGetRevision');
Route::get('RevisionTecnica/Mantenimiento','RevisionController@ApiGetMantenimiento');
Route::post('RevisionTecnica/create','RevisionController@ApiPostRevision');

//Tranferencia
Route::get('Tranferencia','TranferenciaController@ApiGetTraferencia');
Route::post('Tranferencia/create','TranferenciaController@ApiPostTranferencia');

//Ubicacion
Route::get('Ubicacion','UbicacionController@ApiGetUbicacion');

//Custodio
Route::get('Custodio','CustodioController@ApiGetCustodio');

//Responsable
Route::get('Responsable','ResponsableController@ApiGetResponsable');

//Bien
Route::get('Bien','BienController@ApiGetBien');
Route::post('Bien/create','BienController@ApiPostBien');

//Operador
Route::get('Operador','OperadorController@getApiOperador');

//Departamento
Route::get('Departamento','DepartamentoController@getApiDepartamento');

//Almacen
Route::get('Almacen','AlmacenController@getApiAlmacen');

//Rubro
Route::get('Rubro','RubroController@getApiRubro');

//Categoria
Route::get('Categoria','CategoriaController@getApiCategoria');

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
