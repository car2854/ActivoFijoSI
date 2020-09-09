<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use activofijo\Custodio;
use activofijo\Log_Change;
use Illuminate\Auth\SessionGuard;
use Carbon\Carbon;

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
    
    
    $log = new Log_Change;
    $log->id_user = $idU->value('id');
    $log->accion = 'Registro a un nuevo custodio desde el movil';
    
    $now = Carbon::now();
    $log->fechaAccion = $now->format('d/m/Y H:i:s');

    $log->save();
    
    
    return response()->json($custodio,200);

  }
}
