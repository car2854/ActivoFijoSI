<?php

namespace activofijo\Http\Controllers;

use DB;

use Carbon\Carbon;
use activofijo\Log_Change;
use activofijo\Responsable;
use Illuminate\Http\Request;

use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Controllers\Controller;
use activofijo\Http\Requests\ResponsableFormRequest;


class ResponsableController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
    		if($request){
    			$query = trim($request->get('searchText'));
    			$responsables = DB::table('responsable')
                ->where('Nombre','LIKE','%'.$query.'%')
                ->orderBy('Nombre','asc')
                ->paginate(5);
    			return view('empleado.responsable.index',["responsables"=>$responsables,"searchText"=>$query]);
    		}
    }

    public function create(){
    	return view("empleado.responsable.create");

    }

    public function store(ResponsableFormRequest $request){
    	$responsable = new Responsable;
        $responsable->CodResponsable = $request->get('codigo');
    	$responsable->Nombre = $request->get('nombre');
    	$responsable->Apellido = $request->get('apellido');
        $responsable->Telefono = $request->get('telefono');
        $responsable->Estado = 1;
    	$responsable->save();

        $sql = "SELECT max(id) as id
                FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Registro a un nuevo responsable de activos';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

    	return Redirect('empleado/responsable');

    }


    public function show($id){
    	return view('empleado.responsable.show',["responsable"=>Responsable::findOrFail($id)]);
    }

    public function edit($id){
    	return view('empleado.responsable.edit',["responsable"=>Responsable::findOrFail($id)]);
    }

    public function update(ResponsableFormRequest $request, $id){
    	$responsable = Responsable::findOrFail($id);
        $responsable->CodResponsable = $request->get('codigo');
    	$responsable->Nombre = $request->get('nombre');
    	$responsable->Apellido = $request->get('apellido');
    	$responsable->Telefono = $request->get('telefono');
        $responsable->update();

        $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Actualizo el registro de un responsable de activos';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

    	return Redirect('empleado/responsable');
    }


    public function destroy($id){
    	$responsable = Responsable::findOrFail($id);
        $responsable->Estado = 0;
        $responsable->update();

        $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Elimino el registro de un responsable de activos';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

    	return Redirect('empleado/responsable');
    }

    public function crearPDF(){

      $vistaUrl = "reportes.responsable";
      $responsable = DB::table('responsable')
      ->where('Estado','=','1')
      ->get();
      $data = $responsable;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-responsable.pdf');
    }
    
    public function ApiGetResponsable(){

        $responsable=DB::table('responsable')
        ->where('Estado','=','1')->get();

        return response()->json($responsable);

    }
}
