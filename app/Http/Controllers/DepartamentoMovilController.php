<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use activofijo\Departamento;
use DB;
use activofijo\Log_Change;
use Illuminate\Auth\SessionGuard;
use Carbon\Carbon;

class DepartamentoMovilController extends Controller
{
  public function index(Request $request){

    $query = trim($request->get('Ciudad'));
    $departamento=DB::table('departamento')->where('ubicacion.Ciudad','LIKE','%'.$query.'%')
    ->join('ubicacion','ubicacion.CodUbicacion','=','departamento.CodUbicacion')
    ->select('departamento.CodDepartamento','departamento.Descripcion','ubicacion.Edificio','ubicacion.Ciudad')
    ->where('departamento.Estado','=','1')->get();
    return response()->json($departamento,200);

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
    $log->accion = 'Registro a un nuevo departamento desde el movil';

    $now = Carbon::now();
    $log->fechaAccion = $now->format('d/m/Y H:i:s');

    $log->save();

    $count = DB::table('departamento')->count();

    $departamento=new Departamento;
    $departamento->CodDepartamento = $count+20;
    $departamento->Descripcion = $request->get('Descripcion');
    $departamento->CodUbicacion = $request->get('CodUbicacion');
    $departamento->Estado = '1';
    $departamento->save();
    return response()->json($departamento,200);

  }

}
