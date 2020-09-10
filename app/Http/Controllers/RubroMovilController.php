<?php

namespace activofijo\Http\Controllers;

use DB;
use Carbon\Carbon;
use activofijo\Rubro;
use activofijo\Log_Change;
use Illuminate\Http\Request;
use Illuminate\Auth\SessionGuard;
use activofijo\Http\Controllers\Controller;


class RubroMovilController extends Controller
{
  public function index(Request $request){

    $query = trim($request->get('Descripcion'));
    $rubro=DB::table('rubro')->where('rubro.Descripcion','LIKE','%'.$query.'%')
    ->get();
    return response()->json($rubro,200);
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
    $log->accion = 'Registro a un nuevo rubro desde el movil';

    $now = Carbon::now();
    $log->fechaAccion = $now->format('d/m/Y H:i:s');

    $log->save();

    $rubro=new rubro;
    $rubro->Descripcion = $request->get('Descripcion');
    $rubro->vidautil = $request->get('vidautil');
    $rubro->coeficiente = 100 / $request->get('vidautil');
    $rubro->deprecia = $request->get('deprecia');
    $rubro->actualiza = $request->get('actualiza');
    $rubro->save();
    return response()->json($rubro,200);

  }

}
