<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;

use activofijo\Http\Requests;
use activofijo\Almacen;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Requests\AlmacenFormRequest;
use DB;

use activofijo\Log_Change;
use Illuminate\Auth\SessionGuard;
use Carbon\Carbon;


class AlmacenController extends Controller
{
    public function index(Request $request){
        if ($request){
          //filtro texto de busqueda
          $query=trim($request->get('searchText'));
          $almacen=DB::table('almacen')->where('NroAlmacen','LIKE','%'.$query.'%')
          ->where('Estado','=','1')
          ->orderBy('NroAlmacen','asc')
          ->paginate(10);

          //retornar la vista, y [enviar como parametros"$nombre con que se va a encontrar"=>$nombre de la variable,enviar como parametros"$nombre con que se va a encontrar"=>$nombre de la variabl,enviar la vista]
          return view('Almacenamiento.Almacen.index',["almacen"=>$almacen,"searchText"=>$query]);
        }
      }

      public function create(){
        return view("Almacenamiento.Almacen.Create");
      }
      //almacenar el objeto POST
      public function store(AlmacenFormRequest $request){
        $almacen=new Almacen;
        $almacen->NroAlmacen = $request->get('NroAlmacen');
        $almacen->Direccion = $request->get('Direccion');
        $almacen->Estado = "1";
        $almacen->save();

        $sql = "SELECT max(id) as id
                FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Registro un nuevo almacen';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


        return Redirect::to('Almacenamiento/Almacen');
      }

      public function show($id){
        //findOrFail solo mostrar la categoria $id
        return view("Almacenamiento.Almacen.Show",["almacen"=>Almacen::findOrFail($id)]);
      }

      public function edit($id){
        return view("Almacenamiento.Almacen.Edit",["almacen"=>Almacen::findOrFail($id)]);
      }

      public function update(AlmacenFormRequest $request, $id){

        $almacen=Almacen::findOrFail($id);
        $almacen->Direccion = $request->get('Direccion');
        $almacen->update();

        $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'actualizo el registro de un almacen';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

        return Redirect::to('Almacenamiento/Almacen');
      }

      public function destroy($id){

        $almacen=Almacen::findOrFail($id);
        $almacen->delete();

        $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Elimino el registro de un almacen';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


        return Redirect::to('Almacenamiento/Almacen');
      }


      public function crearPDF(){

      $vistaUrl = "reportes.almacen";

      //consulta
      $almacen=DB::table('almacen')
          ->where('Estado','=','1')
          ->orderBy('NroAlmacen','asc')
      ->get();
      //fin consulta

      $data = $almacen;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-almacen.pdf');
    }
    
    
    public function getApiAlmacen(){
        $almacen=DB::table('almacen')
        ->where('Estado','=','1')->get();
        return response()->json($almacen,200);
    }
}
