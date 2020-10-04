<?php

namespace activofijo\Http\Controllers;

use DB;

use Carbon\Carbon;
use activofijo\Log_Change;
use Illuminate\Http\Request;
use activofijo\Http\Requests;
use activofijo\Mantenimiento;

use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Controllers\Controller;
use activofijo\Http\Requests\OperadorFormRequest;
use activofijo\Http\Requests\MantenimientoFormRequest;



class MantenimientoController extends Controller
{
  public function index(Request $request){
    if ($request){

      $query=trim($request->get('searchText'));

      $Mantenimiento=DB::table('revisiontecnica')->where('revisiontecnica.CodBien','LIKE','%'.$query.'%')
      ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
      ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
      ->join('mantenimiento','mantenimiento.NroRevision','=','revisiontecnica.NroRevision')
      ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
      ->select('bien.CodBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','operador.Nombre as NombreOperador','mantenimiento.FechaInicio','mantenimiento.FechaFinalizo','mantenimiento.Problema','mantenimiento.Solucion','mantenimiento.Costo')
      ->orderBy('revisiontecnica.CodBien','desc')
      ->paginate(7);

      return view('RevisionTecnica.Mantenimiento.index',["mantenimiento"=>$Mantenimiento,"searchText"=>$query]);
    }
  }

  public function create($NroR){
    return view("RevisionTecnica.Mantenimiento.Create",["NroR"=>$NroR]);
  }

    public function store(MantenimientoFormRequest $request){

        $sql = "SELECT max(NroMantenimiento) as id
        FROM mantenimiento;";
        $consulta = DB::select($sql);

        $fechaInicio = $request->get('FechaInicio');
        $fechaFin = $request->get('FechaFinalizo');

        $anioI = substr($fechaInicio,0,4);
        $mesI = substr($fechaInicio,5,2);
        $diaI = substr($fechaInicio,8,2);
        $fechaInicio = $anioI . '-' . $mesI . '-' . $diaI;

        $anioF = substr($fechaFin,0,4);
        $mesF = substr($fechaFin,5,2);
        $diaF = substr($fechaFin,8,2);
        $fechaFin = $anioF . '-' . $mesF . '-' . $diaF;


        $mant=new mantenimiento;
        $mant->NroMantenimiento = $consulta[0]->id + 1;
        $mant->NroRevision = $request->get('NroRevision');
        $mant->Problema = $request->get('Problema');
        $mant->Solucion = $request->get('Solucion');
        $mant->FechaInicio = $fechaInicio;
        $mant->FechaFinalizo = $fechaFin;
        $mant->HoraIncio = $request->get('HoraInicio');
        $mant->HoraFinalizo = $request->get('HoraFinalizo');
        $mant->Duraccion = $request->get('Duraccion');
        $mant->Costo = $request->get('Costo');
        $mant->save();


        $sql = "SELECT max(id) as id
        FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Realizo un mantenimiento';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


            return Redirect::to('/RevisionTecnica/revisiontecnica');
    }

  public function show($id){

    return view("RevisionTecnica.Operador.Show");
  }

  public function edit($id){
    return view("RevisionTecnica.Operador.Edit");
  }

  public function update(OperadorFormRequest $request, $id){

    return Redirect::to('RevisionTecnica/Operador');
  }

  public function destroy($id){

    return Redirect::to('RevisionTecnica/Operador');
  }

  public function crearPDF(){

      $vistaUrl = "reportes.mantenimiento";
      $Mantenimiento=DB::table('revisiontecnica')
      ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
      ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
      ->join('mantenimiento','mantenimiento.NroRevision','=','revisiontecnica.NroRevision')
      ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
      ->select('bien.CodBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','operador.Nombre as NombreOperador','mantenimiento.FechaInicio','mantenimiento.FechaFinalizo','mantenimiento.Problema','mantenimiento.Solucion','mantenimiento.Costo')
      ->orderBy('revisiontecnica.CodBien','desc')
      ->get();
      $data = $Mantenimiento;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-mantenimiento.pdf');
    }
    
    public function ApiGetMantenimiento(){
    
        $Mantenimiento=DB::table('revisiontecnica')
        ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
        ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
        ->join('mantenimiento','mantenimiento.NroRevision','=','revisiontecnica.NroRevision')
        ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
        ->select('bien.CodBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','operador.Nombre as NombreOperador','mantenimiento.FechaInicio','mantenimiento.FechaFinalizo','mantenimiento.Problema','mantenimiento.Solucion','mantenimiento.Costo')
        ->orderBy('revisiontecnica.CodBien','desc')->get();
        
        return response()->json($Mantenimiento);
        
    }
    
    public function ApiPostMantenimiento(Request $request){

        $sql = "SELECT max(NroMantenimiento) as id
        FROM mantenimiento;";
        $consulta = DB::select($sql);

        $fechaInicio = $request->get('fechaInicio');
        $fechaFin = $request->get('fechaFin');

        $anioI = substr($fechaInicio,0,4);
        $mesI = substr($fechaInicio,5,2);
        $diaI = substr($fechaInicio,8,2);
        $fechaInicio = $anioI . '-' . $mesI . '-' . $diaI;

        $anioF = substr($fechaFin,0,4);
        $mesF = substr($fechaFin,5,2);
        $diaF = substr($fechaFin,8,2);
        $fechaFin = $anioF . '-' . $mesF . '-' . $diaF;


        $mant=new mantenimiento;
        $mant->NroMantenimiento = $consulta[0]->id + 1;
        $mant->NroRevision = $request->get('idRevision');
        $mant->Problema = $request->get('problema');
        $mant->Solucion = $request->get('solucion');
        $mant->FechaInicio = $fechaInicio;
        $mant->FechaFinalizo = $fechaFin;
        $mant->HoraIncio = $request->get('horaInicio');
        $mant->HoraFinalizo = $request->get('horaFin');
        $mant->Duraccion = $request->get('duracion');
        $mant->Costo = $request->get('costo');
        $mant->save();


        $sql = "SELECT max(id) as id
        FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = $request->get('idUsuario');
        $log->accion = 'Realizo un mantenimiento desde el movil';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();



        return response()->json(1);

    }
    
}
