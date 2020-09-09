<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MantenimientoMovilController extends Controller
{
  public function index(Request $request){

    $query = trim($request->get('CodBien'));
    $mantenimiento=DB::table('revisiontecnica')->where('revisiontecnica.CodBien','LIKE','%'.$query.'%')
    ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
    ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
    ->join('mantenimiento','mantenimiento.NroRevision','=','revisiontecnica.NroRevision')
    ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
    ->select('bien.CodBien as CodigoBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','operador.Nombre as NombreOperador','revisiontecnica.FechaHora as FechaHoraRevisionTecnica','mantenimiento.Problema','mantenimiento.Solucion','mantenimiento.Duraccion','mantenimiento.Costo')->get();
    return response()->json($mantenimiento,200);

  }
}
