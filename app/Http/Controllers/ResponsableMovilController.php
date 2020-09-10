<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use activofijo\Responsable;
use activofijo\Log_Change;
use Illuminate\Auth\SessionGuard;
use Carbon\Carbon;

class ResponsableMovilController extends Controller
{
  public function index(Request $request){

    $query = trim($request->get('NombreResponsable'));
    $responsable=DB::table('responsable')->where('responsable.Nombre','LIKE','%'.$query.'%')
    ->where('Estado','=','1')
    ->get();
    return response()->json($responsable,200);
  }

  public function store(Request $request){
    $responsable=new responsable;
    $responsable->CodResponsable = $request->get('CodResponsable');
    $responsable->Nombre = $request->get('Nombre');
    $responsable->Apellido = $request->get('Apellido');
    $responsable->Telefono = $request->get('Telefono');
    $responsable->Estado = $request->get('Estado');
    $responsable->save();


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
    $log->accion = 'Registro a un nuevo responsable desde el movil';

    $now = Carbon::now();
    $log->fechaAccion = $now->format('d/m/Y H:i:s');

    $log->save();



    return response()->json($responsable,200);

  }
}
