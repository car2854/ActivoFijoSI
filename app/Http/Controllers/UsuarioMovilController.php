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
                return response()->json($resultado, 200);
            }
            return json_encode(0);
        }
    }


    public function index(Request $request){
        $usuario = User::where('Estado',1)->get();
        return response()->json($usuario, 200);
    }



    
    public function store(Request $request){

        $codigo = DB::table('users')->max('id');

        $usuario = new User;
        $usuario->id = $codigo + 1;
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');

        $verificar = DB::table('users')
            ->where('email', $request->input('email'))->count('email');

        if($verificar == 1){
            return json_encode('Existe');
        }

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
        $log->id_user = $request->input('CodigoUsuario');
        $log->accion = 'Registro a un nuevo usuario';
        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');
        $log->save();

        return json_encode('Creado');
    }



    public function update(Request $request, $id){

        $usuario = User::findOrFail($id);
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');

        $verificar = DB::table('users')->where('email', $request->input('email'))->count('email');
        if($verificar == 1){
            return json_encode('Existe');
        }

        if($request->input('password') != NULL){
                $usuario->password = bcrypt($request->get('password'));
        }

        $usuario->update();

        $sql = "SELECT max(id) as id
        FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = $request->input('CodigoUsuario');
        $log->accion = 'Actualizo el registro de un usuario';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

    	return json_encode('Actualizado');
    }


    public function eliminar($id, Request $request){
    	$usuario = User::findOrFail($id);
        $usuario->Estado = 0;
        $usuario->update();


        $sql = "SELECT max(id) as id
        FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = $request->get('idUsuario');
        $log->accion = 'Se elimino un usuario desde el movil';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

        return json_encode('Eliminado');
    }

}

