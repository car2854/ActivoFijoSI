<?php

namespace activofijo\Http\Controllers;

use activofijo\Categoria;
use activofijo\User;
use Illuminate\Http\Request;
use DB;
use Exception;
use activofijo\Log_Change;
use Illuminate\Auth\SessionGuard;
use Carbon\Carbon;

use activofijo\Http\Controllers\Controller;
use Illuminate\Validation\Rules\RequiredIf;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use activofijo\Http\Requests\CategoriaFormRequest;

use activofijo\Almacen;

class CategoriaMovilController extends Controller
{
  public function index(Request $request)
  {
    $bien = Categoria::all()
    return response()->json($bien, 200);
  }

  public function store(Request $request)
  {

    $nuevaCategoria = Categoria::create($request->all());
    /*
    $sql = "SELECT max(id) as id
                FROM log_change;";
        $consulta = DB::select($sql);
        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = $request->input('CodigoUsuario');
        $log->id_user = auth()->user()->id;
        $log->accion = 'Registró una nueva categoria';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();*/
    return response()->json($nuevaCategoria, 201);
  }


  public function update(Request $request, $id)
  {

    $categoria = Categoria::find($id);

    $categoria->Nombre = $request->input('Nombre');
    $categoria->CodRubro = $request->input('CodRubro');
    $categoria->update();

    /*
    $sql = "SELECT max(id) as id
                FROM log_change;";
        $consulta = DB::select($sql);
        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = $request->input('CodigoUsuario');
        $log->id_user = auth()->user()->id;
        $log->accion = 'Actualizó el registro de la categoria';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();*/
    return response()->json($categoria);
  }


  public function delete(Categoria $categoria)
  {
    $categoria->delete();
    return response()->json(null, 204);
  }

  public function destroy($id){
    $categoria = Categoria::where('CodCategoria', '=', $id)->first();
    if ($categoria != null) {
        $categoria->delete();
        /*$sql = "SELECT max(id) as id
                FROM log_change;";
        $consulta = DB::select($sql);
        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = $request->input('CodigoUsuario');
        $log->id_user = auth()->user()->id;
        $log->accion = 'Eliminó el registro de una categoria';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();*/


        return response()->json($categoria);
    }
    return response()->json($categoria);
  }

}
