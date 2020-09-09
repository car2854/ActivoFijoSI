<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReportBajaController extends Controller
{
    public function index(Request $request){

        if ($request){

            $vbien = DB::table('bien')
            ->where('EstadoBien','=','activo')->get();

            $vcategoria = DB::table('categoria')->get();

            $vcustodio = DB::table('custodio')->where('Estado','=','1')->get();

            $voperador = DB::table('operador')->where('Estado','=','1')->get();

            return view('ReportesDinamicos.Bajas.index',["bien"=>$vbien,"categoria"=>$vcategoria,"custodio"=>$vcustodio,"operador"=>$voperador]);
        }
    }


    public function getInformation(Request $request){
      if ($request){


        $NombreBien = $request->get('NombreBien');
        $NombreCategoria = $request->get('NombreCategoria');
        $Custodio = $request->get('Custodio');
        $Operador = $request->get('Operador');
        $FechaInicio = $request->get('FechaInicio');
        $FechaFin = $request->get('FechaFin');

        if ($NombreBien == 'Todos'){
            $NombreBien = '';
        }
        if ($NombreCategoria == 'Todos'){
            $NombreCategoria = '';
        }
        if ($Custodio == 'Todos'){
            $Custodio = '';
        }
        if ($Operador == 'Todos'){
            $Operador = '';
        }
        if ($FechaInicio == ''){
            $FechaInicio = '0000-01-01';
        }else{
            $anio = substr($FechaInicio,0,4);
            $mes = substr($FechaInicio,5,2);
            $dia = substr($FechaInicio,8,2);
            $FechaInicio = $anio . '-' . $mes . '-' . $dia . ' 00:00:00';
        }
        if ($FechaFin == ''){
            $FechaFin = '2500-12-12 12:12:12';
        }else{
            $anio = substr($FechaFin,0,4);
            $mes = substr($FechaFin,5,2);
            $dia = substr($FechaFin,8,2);
            $FechaFin = $anio . '-' . $mes . '-' . $dia . ' 23:12:59';
        }

        $vlista = DB::table('revisiontecnica')
        ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
        ->where('bien.Nombre','LIKE','%'.$NombreBien.'%')
        ->join('categoria','categoria.CodCategoria','=','bien.CodCategoria')
        ->where('categoria.Nombre','LIKE','%'.$NombreCategoria.'%')
        ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
        ->where('custodio.Nombre','LIKE','%'.$Custodio.'%')
        ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
        ->where('operador.Nombre','LIKE','%'.$Operador.'%')
        ->join('baja','baja.NroRevision','=','revisiontecnica.NroRevision')
        ->whereBetween('baja.FechaHora', [$FechaInicio,$FechaFin])
        ->select('bien.CodBien as CodigoBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','operador.Nombre as NombreOperador','categoria.Nombre as NombreCategoria','baja.FechaHora')
        ->get();


        return view('ReportesDinamicos.Bajas.viewAjax',["lista"=>$vlista]);

      }
    }


    public function getPDF($NombreBien,$NombreCategoria,$Custodio,$Operador,$FechaInicio,$FechaFin){

      if ($NombreBien == 'Todos'){
          $NombreBien = '';
      }
      if ($NombreCategoria == 'Todos'){
          $NombreCategoria = '';
      }
      if ($Custodio == 'Todos'){
          $Custodio = '';
      }
      if ($Operador == 'Todos'){
          $Operador = '';
      }
      if ($FechaInicio == '0'){
          $FechaInicio = '0000-01-01';
      }else{
          $anio = substr($FechaInicio,0,4);
          $mes = substr($FechaInicio,5,2);
          $dia = substr($FechaInicio,8,2);
          $FechaInicio = $anio . '-' . $mes . '-' . $dia . ' 00:00:00';
      }
      if ($FechaFin == '0'){
          $FechaFin = '2500-12-12 12:12:12';
      }else{
          $anio = substr($FechaFin,0,4);
          $mes = substr($FechaFin,5,2);
          $dia = substr($FechaFin,8,2);
          $FechaFin = $anio . '-' . $mes . '-' . $dia . ' 23:12:59';
      }

      $vistaUrl = "ReportesDinamicos.Bajas.descarga";
      $responsable = DB::table('revisiontecnica')
    ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
    ->where('bien.Nombre','LIKE','%'.$NombreBien.'%')
    ->join('categoria','categoria.CodCategoria','=','bien.CodCategoria')
    ->where('categoria.Nombre','LIKE','%'.$NombreCategoria.'%')
    ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
    ->where('custodio.Nombre','LIKE','%'.$Custodio.'%')
    ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
    ->where('operador.Nombre','LIKE','%'.$Operador.'%')
    ->join('baja','baja.NroRevision','=','revisiontecnica.NroRevision')
    ->whereBetween('baja.FechaHora', [$FechaInicio,$FechaFin])
    ->select('bien.CodBien as CodigoBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','operador.Nombre as NombreOperador','categoria.Nombre as NombreCategoria','baja.FechaHora')
    ->get();
      $data = $responsable;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-Baja.pdf');
    }

}
