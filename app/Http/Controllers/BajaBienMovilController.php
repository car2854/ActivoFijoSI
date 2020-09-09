<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BajaBienMovilController extends Controller
{
  public function index(Request $request){

    $query = trim($request->get('CodBien'));
    $baja=DB::table('revisiontecnica')->where('revisiontecnica.CodBien','LIKE','%'.$query.'%')
    ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
    ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
    ->join('baja','baja.NroRevision','=','revisiontecnica.NroRevision')
    ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
    ->select('bien.CodBien as CodigoBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','operador.Nombre as NombreOperador','revisiontecnica.FechaHora as FechaHoraRevisionTecnica','baja.FechaHora as FechaHoraBaja','baja.Descripcion as DescripcionBaja')->get();
    return response()->json($baja,200);
  }
}
