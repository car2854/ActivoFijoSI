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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

Route::resource('almacen/rubro','RubroController');
Route::resource('almacen/categoria','CategoriaController');
Route::resource('ubicacion/ubicacion','UbicacionController');
Route::resource('ubicacion/departamento','DepartamentoController');
Route::resource('empleado/responsable','ResponsableController');
Route::resource('empleado/operador','OperadorController');
Route::resource('empleado/proveedor','ProveedorController');
Route::resource('empleado/custodio','CustodioController');
Route::resource('Almacenamiento/Almacen','AlmacenController');
Route::resource('bienes/bien','BienController');
Route::get('/{id}','BienController@getCategorias');



Route::resource('tranferencia/transferencia','TranferenciaController');

Route::resource('solicitud/solicitud','SolicitudController');

Route::resource('adquisicion/adquisicion','AdquisicionController');
//Route::resource('Almacenamiento/Almacen','AlmacenController');
Route::resource('RevisionTecnica/Baja','BajaController');
Route::resource('RevisionTecnica/Revaluo','RevaluoController');
Route::resource('RevisionTecnica/Mantenimiento','MantenimientoController');
//Route::resource('RevisionTecnica/Operador','OperadorController');
Route::resource('RevisionTecnica/revisiontecnica','RevisionController');

Route::get('RevisionTecnica/Baja/create/{Nro}','BajaController@create');
Route::post('RevisionTecnica/Baja/create/{Nro}','BajaController@store');

Route::get('RevisionTecnica/Mantenimiento/create/{Nro}','MantenimientoController@create');
Route::post('RevisionTecnica/Mantenimiento/create/{Nro}','MantenimientoController@store');

Route::get('RevisionTecnica/Revaluo/create/{Nro}','RevaluoController@create');
Route::post('RevisionTecnica/Revaluo/create/{Nro}','RevaluoController@store');

Route::resource('depreciacion/depreciacion','DepreciacionController');



Route::resource('seguridad/usuario','UsuarioController');
Route::resource('seguridad/bitacora','Log_ChangeController');

//reportes dinamicos
Route::get('report/activoFijo','ReportActivoFijoController@index');
Route::get('report/activoFijo/getInformation','ReportActivoFijoController@getInformation');
Route::get('report/activoFijo/getPDF/{NombreBien}/{NombreCategoria}/{Departamento}/{ValorCompraInicial}/{ValorCompraFinal}/{FechaInicio}/{FechaFin}','ReportActivoFijoController@getPDF');

Route::get('report/baja','ReportBajaController@index');
Route::get('report/baja/getInformation','ReportBajaController@getInformation');
Route::get('report/baja/getPDF/{NombreBien}/{NombreCategoria}/{Custodio}/{Operador}/{FechaInicio}/{FechaFin}','ReportBajaController@getPDF');

Route::get('report/bitacora','ReportBitacoraController@index');
Route::get('report/bitacora/getInformation','ReportBitacoraController@getInformation');
Route::get('report/bitacora/getPDF/{Usuario}/{Rol}/{FechaInicio}/{FechaFin}','ReportBitacoraController@getPDF');


//reportes
Route::get('empleado/reporteResponsable','ResponsableController@crearPDF');
Route::get('empleado/reporteProveedor','ProveedorController@crearPDF');
Route::get('empleado/reporteCustodio','CustodioController@crearPDF');
Route::get('empleado/reporteOperador','OperadorController@crearPDF');
Route::get('bienes/reporteBien','BienController@crearPDF');
Route::get('depreciacion/reporteDepreciacion','DepreciacionController@crearPDF');
Route::get('tranferencia/reporteTransferencia','TranferenciaController@crearPDF');
Route::get('RevisionTecnica/reporteBaja','BajaController@crearPDF');
Route::get('ubicacion/reporteUbicacion','UbicacionController@crearPDF');
Route::get('ubicacion/reporteDepartamento','DepartamentoController@crearPDF');
Route::get('Almacenamiento/reporteAlmacen','AlmacenController@crearPDF');
Route::get('almacen/reporteRubro','RubroController@crearPDF');
Route::get('almacen/reporteCategoria','CategoriaController@crearPDF');
Route::get('adquisicion/reporteAdquisicion','AdquisicionController@crearPDF');
Route::get('seguridad/reporteBitacora','Log_ChangeController@crearPDF');
Route::get('seguridad/reporteUsuario','UsuarioController@crearPDF');
Route::get('RevisionTecnica/reporteMantenimiento','MantenimientoController@crearPDF');

//Notifications

//RegistrosActividades
Route::get('usuario/RegistroActividades','UltimaActividadesController@getActividades');
//PerfilUsuario
Route::get('usuario/PerfilUsuario/{id}','UltimaActividadesController@GetPerfil');

Route::get('main/notification','NotificationController@index');


