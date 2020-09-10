<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use activofijo\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioMovilController extends Controller
{
  public function index(Request $request){

    $query = trim($request->get('User'));

    $user=DB::table('users')->where('name','=',$query)
    ->select('password')->get();

    $respuesta = [];

    if (sizeof($user) == 1){

        $user=DB::table('users')->where('name','=',$query)
        ->select('id');

        $administrador = DB::table('model_has_roles')
        ->where('model_id','=',$user->value('id'))
        ->where('role_id','=','1')
        ->get();


        if (sizeof($administrador) == 1){
          $user=DB::table('users')->where('name','=',$query)
          ->select('password');


          if (password_verify(trim($request->get('Password')),$user->value('password'))){
            $respuesta = DB::table('users')->where('name','=',$query)
            ->select('name','password')->get();
          }
        }

    }

    return response()->json($respuesta,200);
  }
}
