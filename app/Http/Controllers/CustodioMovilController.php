<?php

namespace activofijo\Http\Controllers;

use DB;
use Carbon\Carbon;
use activofijo\Custodio;
use activofijo\Log_Change;
use Illuminate\Http\Request;
use Illuminate\Auth\SessionGuard;
use activofijo\Http\Controllers\Controller;

class CustodioMovilController extends Controller
{
  public function index(Request $request){

    $query = trim($request->get('Nombre'));
    $custodio=DB::table('custodio')->where('custodio.Nombre','LIKE','%'.$query.'%')
    ->join('departamento','departamento.CodDepartamento','=','custodio.CodDepartamento')
    ->where('custodio.Estado','=','1')
    ->select('custodio.CodCustodio','custodio.Nombre','custodio.Apellido','custodio.Telefono','custodio.Estado','custodio.CodDepartamento','departamento.Descripcion as NombreDepartamento')
    ->get();
    return response()->json($custodio,200);

  }

  public function store(Request $request){

    $custodio=new custodio;
    $custodio->CodCustodio = $request->get('CodCustodio');
    $custodio->Nombre = $request->get('Nombre');
    $custodio->Apellido = $request->get('Apellido');
    $custodio->Telefono = $request->get('Telefono');
    $custodio->Estado = $request->get('Estado');
    $custodio->CodDepartamento = $request->get('CodDepartamento');
    $custodio->save();

    $user = $request->get('users');
    $idU = DB::table('users')
    ->where('users.name','LIKE','%'.$user.'%')
    ->select('users.id');


    $sql = "SELECT max(id) as id
    FROM log_change;";
    $consulta = DB::select($sql);

    $log = new Log_Change;
    $log->id = $consulta[0]->id + 1;
    $log->id_user = auth()->user()->id;
    $log->accion = 'Registro a un nuevo custodio desde el movil';

    $now = Carbon::now();
    $log->fechaAccion = $now->format('d/m/Y H:i:s');

    $log->save();


    return response()->json($custodio,200);

  }
}
