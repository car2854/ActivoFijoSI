<?php

namespace activofijo\Http\Controllers;

use DB;

use Carbon\Carbon;
use activofijo\Operador;
use activofijo\Log_Change;
use Illuminate\Http\Request;

use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Controllers\Controller;
use activofijo\Http\Requests\OperadorFormRequest;

class OperadorController extends Controller
{
    public function index(Request $request){
        if ($request){
          //filtro texto de busqueda
          $query=trim($request->get('searchText'));
          $operador=DB::table('operador')->where('Nombre','LIKE','%'.$query.'%')
          ->where('Estado','=','1')
          ->orderBy('CodOperador','asc')
          ->paginate(10);

          //retornar la vista, y [enviar como parametros"$nombre con que se va a encontrar"=>$nombre de la variable,enviar como parametros"$nombre con que se va a encontrar"=>$nombre de la variabl,enviar la vista]
          return view('empleado.operador.index',["operador"=>$operador,"searchText"=>$query]);
        }
      }

      public function create(){
        return view("empleado.operador.create");
      }
      //almacenar el objeto POST
      public function store(OperadorFormRequest $request){

        $operador=new Operador;
        $operador->Nombre = $request->get('nombre');
        $operador->Apellido = $request->get('apellido');
        $operador->Telefono = $request->get('telefono');
        $operador->Gmail = $request->get('gmail');
        $operador->Estado = '1';
        $operador->save();

        $sql = "SELECT max(id) as id
                FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Registro a un nuevo operador';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


        return Redirect::to('/empleado/operador');
      }

      public function show($id){
        //findOrFail solo mostrar la categoria $id
        return view("empleado.operador.show",["operador"=>Operador::findOrFail($id)]);
      }

      public function edit($id){
        return view("empleado.operador.edit",["operador"=>Operador::findOrFail($id)]);
      }

      public function update(OperadorFormRequest $request, $id){

        $operador=Operador::findOrFail($id);
        $operador->Nombre = $request->get('Nombre');
        $operador->Apellido = $request->get('Apellido');
        $operador->Telefono = $request->get('Telefono');
        $operador->Gmail = $request->get('Gmail');
        $operador->Estado = '1';
        $operador->update();

        $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'actualizo el registro de un operador';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


        return Redirect::to('empleado/operador');
      }

      public function destroy($id){

        $operador=Operador::findOrFail($id);
        $operador->Estado = '0';
        $operador->update();

        $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Elimino el registro de un operador';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


        return Redirect::to('empleado/operador');
      }


      public function crearPDF(){

      $vistaUrl = "reportes.operador";
      $operador = DB::table('operador')
      ->where('operador.Estado','=','1')
      ->get();
      $data = $operador;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-operador.pdf');
    }
    
    public function getApiOperador(Request $request){

        $query = trim($request->get('Nombre'));
        $operador=DB::table('operador')->where('Nombre','LIKE','%'.$query.'%')
        ->where('Estado','=','1')
        ->get();
        return response()->json($operador,200);
        
    }
}
