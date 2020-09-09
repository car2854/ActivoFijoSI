<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;

use activofijo\User;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Requests\UsuarioFormRequest;
use DB;


use activofijo\Log_Change;
use Illuminate\Auth\SessionGuard;
use Carbon\Carbon;

use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
public function __construct(){

     $this->Middleware('auth');
   }

    public function index(Request $request){
/*    		if($request){
    			$query = trim($request->get('searchText'));
    			$usuarios = DB::table('users')
                ->where('name','LIKE','%'.$query.'%')
                ->orderBy('name','asc')
                ->paginate(5);
    			return view('seguridad.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
    		}
*/
                if($request){
                $query = trim($request->get('searchText'));
                $usuarios = DB::table('users as us')
                ->join('model_has_roles as mr','us.id','=','mr.model_id')
                ->join('roles as ro','mr.role_id','=','ro.id')
                ->select('us.id','us.name','us.email','ro.name as rol','us.created_at','us.Estado')
                ->where('us.Estado','=','1')
                ->where('us.name','LIKE','%'.$query.'%')
                ->orderBy('us.name','asc')
                ->paginate(10);
                return view('seguridad.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
            }

    }

    public function create(){
        $roles = Role::all()->pluck('name','id');
    	return view('seguridad.usuario.create', compact('roles'));

    }

    public function store(UsuarioFormRequest $request){
    	$usuario = new User;
        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->password = bcrypt($request->get('password'));
    	$usuario->save();


        if($usuario->save()){
            $usuario->assignRole($request->rol);
        }


        $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Registro a un nuevo usuario';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

        return Redirect('seguridad/usuario');

    }


    public function edit($id){
    	//return view('seguridad.usuario.edit',["usuario"=>User::findOrFail($id)]);

           $usuario = User::findOrFail($id);
        $roles = Role::all()->pluck('name','id');
    	return view('seguridad.usuario.edit',compact('usuario','roles'));
    }

    public function update(UsuarioFormRequest $request, $id){

        $usuario = User::findOrFail($id);
        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');

        if($request->password != null){
                $usuario->password = bcrypt($request->get('password'));
        }


        $usuario->syncRoles($request->rol);



        $usuario->update();

        $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Actualizo el registro de un usuario';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

    	return Redirect('seguridad/usuario');
    }


    public function destroy($id){
    	$usuario = User::findOrFail($id);
        $usuario->Estado = 0;
        $usuario->update();



        $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Elimino el registro de un usuario';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

        return Redirect('seguridad/usuario');
    }

    public function crearPDF(){

      $vistaUrl = "reportes.usuario";
                $usuarios = DB::table('users as us')
                ->join('model_has_roles as mr','us.id','=','mr.model_id')
                ->join('roles as ro','mr.role_id','=','ro.id')
                ->select('us.id','us.name','us.email','ro.name as rol','us.created_at','us.Estado')
                ->where('us.Estado','=','1')
                ->orderBy('us.name','asc')
                ->get();
      $data = $usuarios;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-usuario.pdf');
    }

}
