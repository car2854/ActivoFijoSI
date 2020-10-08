<?php

namespace activofijo\Http\Controllers;

use DB;
use Response;
use Carbon\Carbon;
use activofijo\Rubro;
use activofijo\Log_Change;
use Illuminate\Http\Request;
use Illuminate\Auth\SessionGuard;


use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Controllers\Controller;
use activofijo\Http\Requests\RubroFormRequest;




class RubroController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));
            $rubro=DB::table('rubro')->where('Descripcion','LIKE','%'.$query.'%')
            ->orderBy('CodRubro','asc')
            ->paginate(10);

            //return Response::json(array('body' => View('almacen.rubro.index',["rubro"=>$rubro,"searchText"=>$query])));
            return view('almacen.rubro.index',["rubro"=>$rubro,"searchText"=>$query]);
        }else{
            return ['data' => json_encode(DB::table('rubro')->get())];
        }
    }
    public function create(){
        return view("almacen.rubro.create");
    }
    public function store(RubroFormRequest $request){

        $sql = "SELECT max(CodRubro) as id
        FROM rubro;";
        $consulta = DB::select($sql);


        $mayuscula = strtoupper($request->get('descripcion'));
        $rubro = new rubro;
        $rubro->CodRubro = $consulta[0]->id + 1;
        $rubro->Descripcion = $mayuscula;
        $rubro->vidautil = $request->get('vidautil');
        $coeficiente = (100) / $request->get('vidautil');
        $rubro->coeficiente = $coeficiente;
        if($request->get('deprecia') != ""){
            $rubro->deprecia = $request->get('deprecia');
        }else{
            $rubro->deprecia = 0;
        }

        if($request->get('actualiza') != ""){
            $rubro->actualiza = $request->get('actualiza');
        }else{
            $rubro->actualiza = 0;
        }
        $rubro->save();




        $sql = "SELECT max(id) as id
                FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Registro un nuevo rubro';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


        return Redirect::to("almacen/rubro");
    }
    public function show($id){
        return view("almacen.rubro.show",["rubro"=>Rubro::findOrFail($id)]);
    }
    public function edit($id){
        return view("almacen.rubro.edit",["rubro"=>Rubro::findOrFail($id)]);
    }
    public function update(RubroFormRequest $request,$id){
        $rubro = Rubro::findOrFail($id);
        $mayuscula = strtoupper($request->get('descripcion'));
        $rubro->Descripcion = $mayuscula;
        $rubro->vidautil = $request->get('vidautil');
        $coeficiente = (100) / $request->get('vidautil');
        $rubro->coeficiente = $coeficiente;
        if($request->get('deprecia') != ""){
            $rubro->deprecia = $request->get('deprecia');
        }else{
            $rubro->deprecia = 0;
        }
        if($request->get('actualiza') != ""){
            $rubro->actualiza = $request->get('actualiza');
        }else{
            $rubro->actualiza = 0;
        }
        $rubro->update();




        $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Actualizo el registro de un rubro';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

        return Redirect::to('almacen/rubro');
    }
    public function destroy($id){
        $rubro = Rubro::where('CodRubro','=',$id)->first();
        $rubro->delete();
        return Redirect::to('almacen/rubro');



        $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Elimino el registro de un rubro';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

    }


    public function crearPDF(){

      $vistaUrl = "reportes.rubro";
      $rubro=DB::table('rubro')
            ->orderBy('CodRubro','asc')
      ->get();
      $data = $rubro;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-rubro.pdf');
    }
    
    
    public function getApiRubro(){
        $rubro=DB::table('rubro')
        ->orderBy('CodRubro','asc')->get();
        return response()->json($rubro,200);
    }
}
