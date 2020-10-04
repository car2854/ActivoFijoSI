<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;

use activofijo\Http\Requests;
use activofijo\Baja;
use activofijo\Revision;
use activofijo\Bien;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Requests\BajaFormRequest;
use DB;

use activofijo\Log_Change;
use Illuminate\Auth\SessionGuard;
use Carbon\Carbon;


class BajaController extends Controller{


  public function index(Request $request){
    if ($request){

      $query=trim($request->get('searchText'));

      $baja=DB::table('revisiontecnica')->where('revisiontecnica.CodBien','LIKE','%'.$query.'%')
      ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
      ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
      ->join('baja','baja.NroRevision','=','revisiontecnica.NroRevision')
      ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
      ->select('bien.CodBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','operador.Nombre as NombreOperador','baja.Descripcion','baja.FechaHora')
      ->orderBy('revisiontecnica.CodBien','desc')
      ->paginate(7);
      return view('RevisionTecnica.Baja.index',["baja"=>$baja,"searchText"=>$query]);
    }
  }

  public function create($NroR){
    return view("RevisionTecnica.Baja.Create",["NroR"=>$NroR]);
  }
  //almacenar el objeto POST
  public function store(BajaFormRequest $request){

    $sql = "SELECT max(NroBaja) as id
    FROM baja;";
    $consulta = DB::select($sql);


    $baja=new baja;
    $baja->NroBaja = $consulta[0]->id + 1;
    $baja->NroRevision = $request->get('NroRevision');
    $baja->Descripcion = $request->get('Descripcion');
    $now = new \DateTime();
    echo $now->format('Y-m-d H:i:s');
    $baja->FechaHora = $now;
    $baja->save();

    $b = DB::table('revisiontecnica')
    ->where('revisiontecnica.NroRevision','=',$request->get('NroRevision'))
    ->get('CodBien')->first();


    $bien=Bien::findOrFail($b->CodBien);
    $bien->EstadoBien = "inactivo";
    $bien->update();



    $sql = "SELECT max(id) as id
    FROM log_change;";
    $consulta = DB::select($sql);

    $log = new Log_Change;
    $log->id = $consulta[0]->id + 1;
    $log->id_user = auth()->user()->id;
    $log->accion = 'Dio de baja un bien';

    $now = Carbon::now();
    $log->fechaAccion = $now->format('d/m/Y H:i:s');

    $log->save();



    return Redirect::to('RevisionTecnica/revisiontecnica');
  }

  public function show($id){
    //findOrFail solo mostrar la categoria $id
    return view("RevisionTecnica.Baja.Show",["baja"=>Baja::findOrFail($id)]);
  }

  public function edit($CodBien,$NombreBien){

    return view("RevisionTecnica.Baja.Edit",["operador"=>Operador::findOrFail($id)]);
  }

  public function update(BajaFormRequest $request, $id){

    return Redirect::to('RevisionTecnica/Baja');
  }

  public function destroy($id){

    return Redirect::to('RevisionTecnica/Baja');
  }

  public function crearPDF(){

      $vistaUrl = "reportes.baja";

      //consulta
     $baja=DB::table('revisiontecnica')
      ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
      ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
      ->join('baja','baja.NroRevision','=','revisiontecnica.NroRevision')
      ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
      ->select('bien.CodBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','operador.Nombre as NombreOperador','baja.Descripcion','baja.FechaHora')
      ->orderBy('revisiontecnica.CodBien','desc')
      ->get();
      //fin consulta

      $data = $baja;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-baja.pdf');
    }
    
    public function ApiGetBaja(){
    
        $baja=DB::table('revisiontecnica')
        ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
        ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
        ->join('baja','baja.NroRevision','=','revisiontecnica.NroRevision')
        ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
        ->select('bien.CodBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','operador.Nombre as NombreOperador','baja.Descripcion','baja.FechaHora')
        ->orderBy('revisiontecnica.CodBien','desc')->get();
        
        return response()->json($baja);
        
    }
    
    
    public function ApiPostBaja(Request $request){
        $sql = "SELECT max(NroBaja) as id
        FROM baja;";
        $consulta = DB::select($sql);


        $baja=new baja;
        $baja->NroBaja = $consulta[0]->id + 1;
        $baja->NroRevision = $request->get('nroRevision');
        $baja->Descripcion = $request->get('descripcion');
        $now = new \DateTime();
        $now->format('Y-m-d H:i:s');
        $baja->FechaHora = $now;
        $baja->save();

        $b = DB::table('revisiontecnica')
        ->where('revisiontecnica.NroRevision','=',$request->get('nroRevision'))
        ->get('CodBien')->first();


        $bien=Bien::findOrFail($b->CodBien);
        $bien->EstadoBien = "inactivo";
        $bien->update();



        $sql = "SELECT max(id) as id
        FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = $request->get('idUsuario');
        $log->accion = 'Dio de baja un bien desde el movil';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();
        
        return response()->json(1);

    }
}
