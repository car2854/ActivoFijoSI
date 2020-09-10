<?php

namespace activofijo\Http\Controllers;

use DB;
use Carbon\Carbon;
use activofijo\Proveedor;
use activofijo\Log_Change;
use Illuminate\Http\Request;
use Illuminate\Auth\SessionGuard;
use activofijo\Http\Controllers\Controller;

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


    $sql = "SELECT max(id) as id
    FROM log_change;";
    $consulta = DB::select($sql);

    $log = new Log_Change;
    $log->id = $consulta[0]->id + 1;
    $log->id_user = auth()->user()->id;
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
