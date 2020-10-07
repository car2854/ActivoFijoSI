<?php

namespace activofijo\Http\Controllers;

use DB;
use Carbon\Carbon;
use activofijo\Ubicacion;
use activofijo\Log_Change;
use activofijo\notification;
use Illuminate\Http\Request;


use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Controllers\Controller;
use activofijo\Http\Requests\UbicacionFormRequest;



class UbicacionController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));
            $ubicacion=DB::table('ubicacion')->where('Edificio','LIKE','%'.$query.'%')
            ->where('Estado','=','1')
            ->orderBy('CodUbicacion','asc')
            ->paginate(10);
            return view('ubicacion.ubicacion.index',["ubicacion"=>$ubicacion,"searchText"=>$query]);
        }

    }
    public function create(){
        return view("ubicacion.ubicacion.create");
    }
    public function store(UbicacionFormRequest $request){

        $edificio = strtoupper($request->get('edificio'));
        $ciudad = strtoupper($request->get('ciudad'));
        $pais = strtoupper($request->get('pais'));
        $ubicacion = new Ubicacion;
        $ubicacion->Edificio = $edificio;
        $ubicacion->Ciudad = $ciudad;
        $ubicacion->Pais = $pais;
        $ubicacion->Estado = 1;
        $ubicacion->save();


        $sql = "SELECT max(id) as id
                FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Registro a una nueva ubicacion';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


        /*
        $save = new notification;
        $save->Visto = '0';
        $save->IdBitacora = $log->id;
        $save->IdUsuario = '6';
        $save->save();
        */


        return Redirect::to("ubicacion/ubicacion");
    }
    public function show($id){
        return view("ubicacion.ubicacion.show",["ubicacion"=>Ubicacion::findOrFail($id)]);
    }
    public function edit($id){
        return view("ubicacion.ubicacion.edit",["ubicacion"=>Ubicacion::findOrFail($id)]);
    }
    public function update(UbicacionFormRequest $request,$id){
        $edificio = strtoupper($request->get('edificio'));
        $ciudad = strtoupper($request->get('ciudad'));
        $pais = strtoupper($request->get('pais'));
        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion->Edificio = $edificio;
        $ubicacion->Ciudad = $ciudad;
        $ubicacion->Pais = $pais;
        $ubicacion->Estado = $ubicacion->Estado;
        $ubicacion->update();


        $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Actualizo el registro a una ubicacion';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


        return Redirect::to('ubicacion/ubicacion');
    }
    public function destroy($id){
        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion->Estado = 0;
        $ubicacion->update();

        $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Elimino el registro deuna ubicacion';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


        return Redirect::to('ubicacion/ubicacion');
    }


    public function crearPDF(){

      $vistaUrl = "reportes.ubicacion";
      $ubicacion=DB::table('ubicacion')
            ->orderBy('CodUbicacion','asc')
            ->where('Estado','=','1')
      ->get();
      $data = $ubicacion;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-ubicacion.pdf');
    }
    
    public function ApiGetUbicacion(){

        $ubicacion=DB::table('ubicacion')
        ->where('Estado','=','1')->get();
        
        return response()->json($ubicacion);

    }
    
    
}
