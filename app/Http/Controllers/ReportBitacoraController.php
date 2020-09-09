<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReportBitacoraController extends Controller
{
    public function index(Request $request){

        if ($request){


             $vuser=DB::table('users as usu')
          ->select('usu.name','usu.email')->get();

            $rol = DB::table('roles')->get();






            return view('ReportesDinamicos.Bitacora.index',["user"=>$vuser,"rol"=>$rol]);
        }
    }

    public function getInformation(Request $request){
      if ($request){


        $NombreUsuario = $request->get('Usuario');
        $roles = $request->get('Rol');
        $FechaInicio = $request->get('FechaInicio');
        $FechaFin = $request->get('FechaFin');

        if ($roles=='Todos'){
            $roles = '';
        }
        if ($NombreUsuario == 'Todos'){
            $NombreUsuario = '';
        }

        if ($FechaInicio == ''){
            $FechaInicio = '01/12/1900 01:01:01';
        }else{
            $anio = substr($FechaInicio,0,4);
            $mes = substr($FechaInicio,5,2);
            $dia = substr($FechaInicio,8,2);
            $FechaInicio = $dia . '/' . $mes . '/' . $anio . ' 00:00:00';
        }
        if ($FechaFin == ''){
            $FechaFin = '27/12/2300 12:12:12';
        }else{
            $anio = substr($FechaFin,0,4);
            $mes = substr($FechaFin,5,2);
            $dia = substr($FechaFin,8,2);
            $FechaFin = $dia . '/' . $mes . '/' . $anio . ' 23:12:59';
        }

        $vlista=DB::table('log_change')
        ->whereBetween('log_change.fechaAccion', [$FechaInicio,$FechaFin])
    ->join('users','log_change.id_user','=','users.id')
    ->where('users.name','LIKE','%'.$NombreUsuario.'%')
    ->join('model_has_roles','users.id','=','model_has_roles.model_id')
    ->join('roles','model_has_roles.role_id','=','roles.id')
    ->where('roles.name','LIKE','%'.$roles.'%')
    ->select('users.name','users.email','log_change.accion','log_change.fechaAccion','roles.name as rol')
      ->get(10);


        return view('ReportesDinamicos.Bitacora.viewAjax',["lista"=>$vlista]);

      }
    }


    public function getPDF($Usuario,$Rol,$FechaInicio,$FechaFin){

      $roles = $Rol;
      $NombreUsuario = $Usuario;

      if ($roles=='Todos'){
          $roles = '';
      }
      if ($NombreUsuario == 'Todos'){
          $NombreUsuario = '';
      }

      if ($FechaInicio == '0'){
          $FechaInicio = '01/12/1900 01:01:01';
      }else{
          $anio = substr($FechaInicio,0,4);
          $mes = substr($FechaInicio,5,2);
          $dia = substr($FechaInicio,8,2);
          $FechaInicio = $dia . '/' . $mes . '/' . $anio . ' 00:00:00';
      }
      if ($FechaFin == '0'){
          $FechaFin = '27/12/2300 12:12:12';
      }else{
          $anio = substr($FechaFin,0,4);
          $mes = substr($FechaFin,5,2);
          $dia = substr($FechaFin,8,2);
          $FechaFin = $dia . '/' . $mes . '/' . $anio . ' 23:12:59';
      }

      $vistaUrl = "ReportesDinamicos.Bitacora.descarga";
        $responsable = DB::table('log_change')
    ->whereBetween('log_change.fechaAccion', [$FechaInicio,$FechaFin])
->join('users','log_change.id_user','=','users.id')
->where('users.name','LIKE','%'.$NombreUsuario.'%')
->join('model_has_roles','users.id','=','model_has_roles.model_id')
->join('roles','model_has_roles.role_id','=','roles.id')
->where('roles.name','LIKE','%'.$roles.'%')
->select('users.name','users.email','log_change.accion','log_change.fechaAccion','roles.name as rol')
  ->get();
        $data = $responsable;
        $date = date('Y-m-d');
        $view = \View::make($vistaUrl, compact('data','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('reporte-Bitacora.pdf');
    }

}
