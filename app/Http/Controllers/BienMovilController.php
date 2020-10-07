<?php

namespace activofijo\Http\Controllers;

use DB;
use Carbon\Carbon;
use activofijo\Bien;
use activofijo\Log_Change;
use Illuminate\Http\Request;
use Illuminate\Auth\SessionGuard;
use activofijo\Http\Controllers\Controller;

class BienMovilController extends Controller
{
  public function index(){

    $bien=DB::table('bien')
    ->join('departamento','departamento.CodDepartamento','=','bien.UbicacionDepartamento')
    ->join('custodio','custodio.CodDepartamento','=','departamento.CodDepartamento')
    ->join('rubro','rubro.CodRubro','=','bien.CodRubro')
    ->select('bien.CodBien','bien.Nombre','bien.FechaAdquisicion','bien.ValorCompra','bien.Estado','bien.UbicacionDepartamento','bien.UbicacionAlmacen','bien.CodCategoria','bien.estadobien','bien.CodRubro','departamento.Descripcion as Ubicacion','custodio.Nombre as NombreCustodio','rubro.vidautil')
    ->where('EstadoBien','=','activo')
    ->get();
    return response()->json($bien,200);
  }

  public function store(Request $request){

    $sql = "SELECT max(id) as id
    FROM log_change;";
    $consulta = DB::select($sql);

    $log = new Log_Change;
    $log->id = $consulta[0]->id + 1;
    $log->id_user = $request->input('CodigoUser');
    $log->accion = 'Registro a un nuevo bien desde el movil';

    $now = Carbon::now();
    $log->fechaAccion = $now->format('d/m/Y H:i:s');

    $log->save();

    $bien=new bien;
    $bien->CodBien = $request->get('CodBien');
    $bien->Nombre = $request->get('Nombre');
    $bien->FechaAdquisicion = $request->get('FechaAdquisicion');
    $bien->ValorCompra = $request->get('ValorCompra');
    $bien->Estado = $request->get('Estado');
    $bien->UbicacionDepartamento = $request->get('UbicacionDepartamento');
    $bien->UbicacionAlmacen = $request->get('UbicacionAlmacen');
    $bien->CodCategoria = $request->get('CodCategoria');
    $bien->EstadoBien = $request->get('estadobien');
    $bien->CodRubro = $request->get('CodRubro');
    $bien->save();
    return response()->json($bien,200);

  }
}
