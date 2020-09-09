<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use activofijo\Ubicacion;
use activofijo\Log_Change;
use Illuminate\Auth\SessionGuard;
use Carbon\Carbon;

class UbicacionMovilController extends Controller
{
    public function index(Request $request){

      $query = trim($request->get('Ciudad'));
      $ubicacion=DB::table('ubicacion')->where('Ciudad','LIKE','%'.$query.'%')
      ->where('Estado','=','1')->get();
      return response()->json($ubicacion,200);
    }

    public function store(Request $request){
        
        $user = $request->get('users');
    $idU = DB::table('users')
    ->where('users.name','LIKE','%'.$user.'%')
    ->select('users.id');
    
    
    $log = new Log_Change;
    $log->id_user = $idU->value('id');
    $log->accion = 'Registro a un nuevo ubicacion desde el movil';
    
    $now = Carbon::now();
    $log->fechaAccion = $now->format('d/m/Y H:i:s');

    $log->save();
        
        
        
      $ubicacion=new ubicacion($request->all());
      $ubicacion->save();
      return response()->json($ubicacion,200);

    }
}
