<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;


use activofijo\Log_Change;
use activofijo\User;
use Illuminate\Support\Facades\Redirect;
use DB;

use Illuminate\Auth\Middleware\Authenticate;

class Log_ChangeController extends Controller
{

    public function __construct(){
      //$this->Middleware('auth');
    }

    public function index(Request $request){
        if ($request){
          $query=trim($request->get('searchText'));
          $log=DB::table('log_change as log')
          ->join('users as usu','log.id_user','=','usu.id')
          ->select('usu.name','usu.email','log.accion','log.fechaAccion')
          ->where('usu.name','LIKE','%'.$query.'%')
          ->paginate(10);
           return view('seguridad.bitacora.index',["log"=>$log,"searchText"=>$query]);
        }
      }
      
      
      public function crearPDF(){

      $vistaUrl = "reportes.bitacora";
      $log=DB::table('log_change as log')
          ->join('users as usu','log.id_user','=','usu.id')
          ->select('usu.name','usu.email','log.accion','log.fechaAccion')
      ->get();
      $data = $log;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-bitacora');
    }
    
    public function ApiGetBitacora(){
        
        $bitacora=DB::table('log_change as log')
          ->join('users as usu','log.id_user','=','usu.id')
          ->select('usu.name','usu.email','log.accion','log.fechaAccion')->orderBy('log.id','desc')->get();
        return response()->json($bitacora);
        
    }
  

}
