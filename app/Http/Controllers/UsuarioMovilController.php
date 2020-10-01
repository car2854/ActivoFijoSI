<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use activofijo\User;
use activofijo\Log_Change;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UsuarioMovilController extends Controller
{

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $resultado = DB::table('users')->where('email',$email)
            ->first();

        if (is_null($resultado)) {
            return json_encode("Error");
        }else {
            if(Hash::check($request->password, $resultado->password)){
                Auth::attempt(['email' => $email, 'password' => $password]);
                return json_encode("Success");
            }
            return json_encode("Error");
        }
    }


    public function prueba(){

        $usuario = Auth::user()->id;

        return json_encode($usuario);
    }

    public function logout(){
        Auth::logout();
    }


    public function index(Request $request){
        $usuario = User::all();
        return response()->json($usuario, 200);
    }

    public function store(Request $request){

        $codigo = DB::table('users')->max('id');

        $usuario = new User;
        $usuario->id = $codigo + 1;
        $usuario->name = $request->input('nombre');
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password'));
    	$usuario->save();

        $nuevoId = $codigo + 1;

        $rol = $request->input('rol');
        $sql = "INSERT INTO model_has_roles
                value($rol,'activofijo\User', $nuevoId);";

        $consulta = DB::insert($sql);

        $codigoBitacora = DB::table('log_change')->max('id');

        $log = new Log_Change;
        $log->id = $codigoBitacora + 1;
        $log->id_user = Auth::user()->id;
        $log->accion = 'Registro a un nuevo usuario';
        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');
        $log->save();

        return response()->json($usuario, 200);

    }
}
