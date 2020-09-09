<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use activofijo\Operador;
use activofijo\Log_Change;
use Illuminate\Auth\SessionGuard;
use Carbon\Carbon;

class OperadorMovilController extends Controller
{
  public function index(Request $request){

    $query = trim($request->get('Nombre'));
    $operador=DB::table('operador')->where('Nombre','LIKE','%'.$query.'%')
    ->where('Estado','=','1')
    ->get();
    return response()->json($operador,200);
  }

  public function store(Request $request){
    
    $user = $request->get('users');
    $idU = DB::table('users')
    ->where('users.name','LIKE','%'.$user.'%')
    ->select('users.id');
    
    
    $log = new Log_Change;
    $log->id_user = $idU->value('id');
    $log->accion = 'Registro a un nuevo operador desde el movil';
    
    $now = Carbon::now();
    $log->fechaAccion = $now->format('d/m/Y H:i:s');

    $log->save();
    
    $operador=new operador;
    $operador->Nombre = $request->get('Nombre');
    $operador->Apellido = $request->get('Apellido');
    $operador->Telefono = $request->get('Telefono');
    $operador->Gmail = $request->get('Gmail');
    $operador->Estado = '1';
    $operador->save();
    return response()->json($operador,200);

  }
}
