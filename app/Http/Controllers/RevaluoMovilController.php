<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RevaluoMovilController extends Controller
{
  public function index(Request $request){

    $query = trim($request->get('CodBien'));
    $revaluo=DB::table('revisiontecnica')->where('revisiontecnica.CodBien','LIKE','%'.$query.'%')
    ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
    ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
    ->join('revaluo','revaluo.NroRevision','=','revisiontecnica.NroRevision')
    ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
    ->select('bien.CodBien as CodigoBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','operador.Nombre as NombreOperador','revisiontecnica.FechaHora as FechaHoraRevisionTecnica','revaluo.Estado as EstadoRevaluo','revaluo.FechaHora as FechaHoraRevaluo','revaluo.Monto as MontoRevaluo','revaluo.Descripcion as DescripcionRevaluo')->get();
    return response()->json($revaluo,200);

  }

}
