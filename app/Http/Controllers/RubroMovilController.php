<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use activofijo\Rubro;
use activofijo\Log_Change;
use Illuminate\Auth\SessionGuard;
use Carbon\Carbon;


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
    
    
    $log = new Log_Change;
    $log->id_user = $idU->value('id');
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
