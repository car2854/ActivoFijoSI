<?php

namespace activofijo\Http\Controllers;

use DB;

//use activofijo\Http\Requests;
use Carbon\Carbon;
use activofijo\Revision;
use activofijo\Log_Change;
use Illuminate\Http\Request;

use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Controllers\Controller;
use activofijo\Http\Requests\RevisionFormRequest;


class RevisionController extends Controller
{

  public function index(Request $request){
    if ($request){

      $query=trim($request->get('searchText'));

      $revision=DB::table('revisiontecnica')->where('revisiontecnica.CodBien','LIKE','%'.$query.'%')
      ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
      ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
      ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
      //->join('custodio','custodio.CodCustodio','=','custodio.CodCustodio')
      ->leftJoin('baja', function($join1){
        $join1->on('baja.NroRevision','=','revisiontecnica.NroRevision');
      })
      //verificar si en la otra tabla es null, la foraing key de esta tabla
      ->whereNull('baja.NroRevision')
      ->leftjoin('mantenimiento', function($join2){
        $join2->on('mantenimiento.NroRevision','=','revisiontecnica.NroRevision');
      })
      ->whereNull('mantenimiento.NroRevision')
      ->leftjoin('revaluo', function($join3){
        $join3->on('revaluo.NroRevision','=','revisiontecnica.NroRevision');
      })
      ->whereNull('revaluo.NroRevision')
      ->select('revisiontecnica.NroRevision','bien.CodBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','custodio.Apellido as ApellidoCustodio','operador.Nombre as NombreOperador','operador.Apellido as ApellidoOperador','revisiontecnica.FechaHora')
      ->orderBy('revisiontecnica.CodBien','desc')
      ->paginate(7);

      //en mantenimiento
      $mant=DB::table('revisiontecnica')->where('revisiontecnica.CodBien','LIKE','%'.$query.'%')
      ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
      ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
      ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
      //->join('custodio','custodio.CodCustodio','=','custodio.CodCustodio')
      ->join('mantenimiento','mantenimiento.NroRevision','=','revisiontecnica.NroRevision')
      ->leftJoin('baja', function($join1){
        $join1->on('baja.NroRevision','=','revisiontecnica.NroRevision');
      })
      //verificar si en la otra tabla es null, la foraing key de esta tabla
      ->whereNull('baja.NroRevision')
      ->leftjoin('revaluo', function($join3){
        $join3->on('revaluo.NroRevision','=','revisiontecnica.NroRevision');
      })
      ->whereNull('revaluo.NroRevision')
      ->select('revisiontecnica.NroRevision','bien.CodBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','custodio.Apellido as ApellidoCustodio','operador.Nombre as NombreOperador','operador.Apellido as ApellidoOperador','revisiontecnica.FechaHora')
      ->orderBy('revisiontecnica.CodBien','desc')
      ->paginate(7);

      return view('RevisionTecnica.revisiontecnica.index',["revision"=>$revision,"mantenimiento"=>$mant,"searchText"=>$query]);
    }
  }

  public function create(){

    $custodio=DB::table('custodio')->where('Estado','=','1')->get();

    //Inactivo si la variable existe, cambiarlo al valor que van a poner a la base de datos
    $bien=DB::table('bien')->where('EstadoBien','<>','Inactivo')->get();
    //>whereNull('UbicacionAlmacen')->get();

    $operador=DB::table('operador')->where('Estado','=','1')->get();

    return view("RevisionTecnica.revisiontecnica.Create",["custodio"=>$custodio,"bien"=>$bien,"operador"=>$operador]);
  }
  //almacenar el objeto POST
  public function store(RevisionFormRequest $request){

    $sql = "SELECT max(NroRevision) as id
    FROM revisiontecnica;";
    $consulta = DB::select($sql);

    $revision = new Revision;
    $revision->NroRevision = $consulta[0]->id + 1;
    $revision->CodBien = $request->get('CodBien');
    $revision->CodCustodio = $request->get('CodCustodio');
    $revision->CodOperador = $request->get('CodOperador');
    $now = new \DateTime();
    echo $now->format('Y-m-d H:i:s');
    $revision->FechaHora = $now;
    $revision->save();


    $sql = "SELECT max(id) as id
    FROM log_change;";
    $consulta = DB::select($sql);

    $log = new Log_Change;
    $log->id = $consulta[0]->id + 1;
    $log->id_user = auth()->user()->id;
    $log->accion = 'Realizo un revision tecnica';

    $now = Carbon::now();
    $log->fechaAccion = $now->format('d/m/Y H:i:s');

    $log->save();

    return Redirect::to('RevisionTecnica/revisiontecnica');
  }

  public function show($id){
    //findOrFail solo mostrar la categoria $id
    return view("RevisionTecnica.Operador.Show",["revision"=>Revision::findOrFail($id)]);
  }

  public function edit($id){
    $estado="baja";
    if ($estado=="baja"){
      return view("RevisionTecnica.EditBaja",["revision"=>Revision::findOrFail($id)]);
    }else if($estado=="mantenimiento"){
      return view("RevisionTecnica.EditMantenimiento",["revision"=>Revision::findOrFail($id)]);
    }else{
      return view("RevisionTecnica.EditRevaluo",["revision"=>Revision::findOrFail($id)]);
    }
  }

  public function update(RevisionFormRequest $request, $id){
    return Redirect::to('RevisionTecnica/Operador');
  }

  public function destroy($id){
    return Redirect::to('RevisionTecnica/Operador');
  }
    
    

    public function ApiGetRevision(){

      $revision=DB::table('revisiontecnica')
      ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
      ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
      ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
      //->join('custodio','custodio.CodCustodio','=','custodio.CodCustodio')
      ->leftJoin('baja', function($join1){
        $join1->on('baja.NroRevision','=','revisiontecnica.NroRevision');
      })
      //verificar si en la otra tabla es null, la foraing key de esta tabla
      ->whereNull('baja.NroRevision')
      ->leftjoin('mantenimiento', function($join2){
        $join2->on('mantenimiento.NroRevision','=','revisiontecnica.NroRevision');
      })
      ->whereNull('mantenimiento.NroRevision')
      ->leftjoin('revaluo', function($join3){
        $join3->on('revaluo.NroRevision','=','revisiontecnica.NroRevision');
      })
      ->whereNull('revaluo.NroRevision')
      ->select('revisiontecnica.NroRevision','bien.CodBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','custodio.Apellido as ApellidoCustodio','operador.Nombre as NombreOperador','operador.Apellido as ApellidoOperador','revisiontecnica.FechaHora')
      ->orderBy('revisiontecnica.CodBien','desc')->get();
        
        return response()->json($revision);

    }
    
    public function ApiGetMantenimiento(){

      //en mantenimiento
      $mant=DB::table('revisiontecnica')
      ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
      ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
      ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
      //->join('custodio','custodio.CodCustodio','=','custodio.CodCustodio')
      ->join('mantenimiento','mantenimiento.NroRevision','=','revisiontecnica.NroRevision')
      ->leftJoin('baja', function($join1){
        $join1->on('baja.NroRevision','=','revisiontecnica.NroRevision');
      })
      //verificar si en la otra tabla es null, la foraing key de esta tabla
      ->whereNull('baja.NroRevision')
      ->leftjoin('revaluo', function($join3){
        $join3->on('revaluo.NroRevision','=','revisiontecnica.NroRevision');
      })
      ->whereNull('revaluo.NroRevision')
      ->select('revisiontecnica.NroRevision','bien.CodBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','custodio.Apellido as ApellidoCustodio','operador.Nombre as NombreOperador','operador.Apellido as ApellidoOperador','revisiontecnica.FechaHora')
      ->orderBy('revisiontecnica.CodBien','desc')->get();
        
        return response()->json($mant);

    }
    
    public function ApiPostRevision(Request $request){
        
        $sql = "SELECT max(NroRevision) as id
        FROM revisiontecnica;";
        $consulta = DB::select($sql);

        $revision = new Revision;
        $revision->NroRevision = $consulta[0]->id + 1;
        $revision->CodBien = $request->get('bien');
        $revision->CodCustodio = $request->get('custodio');
        $revision->CodOperador = $request->get('operador');
        $now = new \DateTime();
        $now->format('Y-m-d H:i:s');
        $revision->FechaHora = $now;
        $revision->save();


        $sql = "SELECT max(id) as id
        FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = $request->get('idUsuario');
        $log->accion = 'Realizo un revision tecnica desde el movil';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

        return response()->json(1);
        
    }
}
