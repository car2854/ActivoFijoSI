<?php

namespace activofijo\Http\Controllers;

use DB;
use auth;
use Carbon\Carbon;
use activofijo\Log_Change;
use activofijo\Departamento;

use Illuminate\Http\Request;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Controllers\Controller;
use activofijo\Http\Requests\DepartamentoFormRequest;



class DepartamentoController extends Controller
{
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));
            $dpto=DB::table('departamento as d')
            ->join('ubicacion as u','u.CodUbicacion','=','d.CodUbicacion')
            ->where('d.Estado','=','1')
            ->select('d.CodDepartamento','d.Descripcion','u.Edificio as edificio','u.Ciudad as ciudad','u.Pais as pais')
            ->where('d.Descripcion','LIKE','%'.$query.'%')
            ->orwhere('u.Edificio','LIKE','%'.$query.'%')
            ->orderBy('d.CodDepartamento','asc')
            ->paginate(10);
            return view('ubicacion.dpto.index',["departamento"=>$dpto,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ubicacion=DB::table('ubicacion')->get();
        return view("ubicacion.dpto.create",["ubicacion"=>$ubicacion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoFormRequest $request)
    {
        $count = DB::table('departamento')->count();
        $mayuscula = strtoupper($request->get('descripcion'));
        $dpto = new Departamento;
        $dpto->CodDepartamento = $count+1;
        $dpto->Descripcion = $mayuscula;
        $dpto->CodUbicacion = $request->get('codubicacion');
        $dpto->save();

        $sql = "SELECT max(id) as id
                FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Registro un nuevo departamento';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

        return Redirect::to("ubicacion/departamento");
        //dd($request->all());
    }


    public function show($id)
    {
        return view("ubicacion.dpto.show",["dpto"=>Departamento::findOrFail($id)]);
    }


    public function edit($id)
    {
        $dpto = Departamento::findOrFail($id);
        $ubicacion=DB::table('Ubicacion')->get();
        return view("ubicacion.dpto.edit",["departamento"=>$dpto,"ubicacion"=>$ubicacion]);
    }


    public function update(DepartamentoFormRequest $request, $id)
    {
        $dpto = Departamento::findOrFail($id);
        $mayuscula = strtoupper($request->get('descripcion'));
        $dpto->Descripcion = $mayuscula;
        $dpto->CodUbicacion = $request->get('codubicacion');
        $dpto->update();


            $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Actualizo el registro de un departamento';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


        return Redirect::to('ubicacion/departamento');
    }


    public function destroy($id)
    {
        $dpto = Departamento::where('CodDepartamento','=',$id)->first();
        $dpto->delete();


            $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Elimino el registro de un departamento';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

        return Redirect::to('ubicacion/departamento');
    }


    public function crearPDF(){

      $vistaUrl = "reportes.departamento";
       $dpto=DB::table('departamento as d')
            ->join('ubicacion as u','u.CodUbicacion','=','d.CodUbicacion')
            ->where('d.Estado','=','1')
            ->select('d.CodDepartamento','d.Descripcion','u.Edificio as edificio','u.Ciudad as ciudad','u.Pais as pais')
            ->orderBy('d.CodDepartamento','asc')
      ->get();
      $data = $dpto;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-departamento.pdf');
    }
    
    
    public function getApiDepartamento(){
        $dpto=DB::table('departamento as d')
        ->join('ubicacion as u','u.CodUbicacion','=','d.CodUbicacion')
        ->where('d.Estado','=','1')
        ->select('d.CodDepartamento','d.Descripcion','u.Edificio','u.Ciudad','u.Pais')
        ->orderBy('d.CodDepartamento','asc')->get();
        return response()->json($dpto);
    }
    
}
