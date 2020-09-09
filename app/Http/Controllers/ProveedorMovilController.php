<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use activofijo\Proveedor;
use activofijo\Log_Change;
use Illuminate\Auth\SessionGuard;
use Carbon\Carbon;

class ProveedorMovilController extends Controller
{
  public function index(Request $request){

    $query = trim($request->get('Nombre'));
    $proveedor=DB::table('proveedor')->where('Nombre','LIKE','%'.$query.'%')
    ->where('Estado','=','1')
    ->get();
    return response()->json($proveedor,200);
  }

  public function store(Request $request){
    
    
    $user = $request->get('users');
    $idU = DB::table('users')
    ->where('users.name','LIKE','%'.$user.'%')
    ->select('users.id');
    
    
    $log = new Log_Change;
    $log->id_user = $idU->value('id');
    $log->accion = 'Registro a un nuevo proveedor desde el movil';
    
    $now = Carbon::now();
    $log->fechaAccion = $now->format('d/m/Y H:i:s');

    $log->save();
    
    
    $proveedor=new proveedor;
    $proveedor->Nombre = $request->get('Nombre');
    $proveedor->Apellido = $request->get('Apellido');
    $proveedor->Telefono = $request->get('Telefono');
    $proveedor->Direccion = $request->get('Direccion');
    $proveedor->Estado = $request->get('Estado');
    $proveedor->save();
    return response()->json($proveedor,200);

  }
}
