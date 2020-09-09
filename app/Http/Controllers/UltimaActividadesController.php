<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UltimaActividadesController extends Controller
{
    public function getActividades(Request $request){

      $consulta=DB::table('log_change')
      ->where('id_user','=',$request->get('Id'))
      ->select('accion','fechaAccion')
      ->orderBy('id','desc')
      ->get(5);

      return view('seguridad.usuario.RegistroActividad',["consulta"=>$consulta]);
    }

    public function GetPerfil($id){

      $usuario = DB::table('users as us')
      ->where('us.id','=',$id)
      ->join('model_has_roles','model_has_roles.model_id','=','us.id')
      ->join('roles','roles.id','=','model_has_roles.role_id')
      ->select('roles.name')->get();



      $consulta=DB::table('log_change')
      ->where('id_user','=',$id)
      ->select('accion','fechaAccion')
      ->orderBy('id','desc')
      ->get(5);

      return view('seguridad.usuario.Perfil',["consulta"=>$consulta,"usuario"=>$usuario]);
    }
}
