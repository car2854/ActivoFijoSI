<?php

namespace activofijo\Http\Controllers;

use DB;

use Response;
use Carbon\Carbon;
use activofijo\Custodio;
use activofijo\Log_Change;
use activofijo\Departamento;

use Illuminate\Http\Request;
use Illuminate\Auth\SessionGuard;




use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Controllers\Controller;
use activofijo\Http\Requests\CustodioFormRequest;


class CustodioController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
    		if($request){
    			$query = trim($request->get('searchText'));
    			$custodios = DB::table('custodio as c')
                ->join('departamento as d','c.CodDepartamento','=','d.CodDepartamento')
                ->select('c.CodCustodio', 'c.Nombre','c.Apellido','c.Telefono', 'd.Descripcion')
                ->where('Nombre','LIKE','%'.$query.'%')
                ->orderBy('Nombre','asc')
                ->paginate(5);
    			return view('empleado.custodio.index',["custodios"=>$custodios,"searchText"=>$query]);
    		}
    }

    public function create(){
        $departamentos = DB::table('departamento')->get();
    	return view("empleado.custodio.create",["departamentos"=>$departamentos]);

    }

    public function store(CustodioFormRequest $request){

        // $request->validated([
        //     'codigo' => 'required|numeric'
        // ]);


    	$custodio = new Custodio;
        $custodio->CodCustodio = $request->get('codigo');
    	$custodio->Nombre = $request->get('nombre');
    	$custodio->Apellido = $request->get('apellido');
        $custodio->Telefono = $request->get('telefono');
        $custodio->Estado = 1;
        $custodio->CodDepartamento = $request->get('departamento');
    	$custodio->save();

        $sql = "SELECT max(id) as id
                FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Registro a un nuevo custodio';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


    	return Redirect('empleado/custodio');

    }


    public function show($id){

        return view('empleado.custodio.show',["custodio"=>Custodio::findOrFail($id)]);
    }

    public function edit($id){
        $custodio = Custodio::findOrFail($id);
        $departamentos = DB::table('departamento')->get();
    	return view('empleado.custodio.edit',["custodio"=>$custodio,"departamentos"=>$departamentos]);
    }

    public function update(CustodioFormRequest $request, $id){
    	$custodio = Custodio::findOrFail($id);
        $custodio->CodCustodio = $request->get('codigo');
    	$custodio->Nombre = $request->get('nombre');
    	$custodio->Apellido = $request->get('apellido');
    	$custodio->Telefono = $request->get('telefono');
        $custodio->CodDepartamento = $request->get('departamento');
        $custodio->update();

                $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Actualizo el registro de un custodio';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

    	return Redirect('empleado/custodio');
    }


    public function destroy($id){
    	$custodio = Custodio::findOrFail($id);
        $custodio->Estado = 0;
        $custodio->update();

                $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Elimino el registro de un custodio';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

    	return Redirect('empleado/custodio');
    }

    public function crearPDF(){

      $vistaUrl = "reportes.custodio";
      $consulta = DB::table('custodio')
      ->join('departamento','departamento.CodDepartamento','=','custodio.CodDepartamento')
      ->where('custodio.Estado','=','1')
      ->select('custodio.CodCustodio as CodCustodio','custodio.Nombre as NombreCustodio','custodio.Apellido as ApellidoCustodio','custodio.Telefono as TelefonoCustodio','departamento.Descripcion as NombreDepartamento')
      ->get();
      $data = $consulta;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-custodio.pdf');
    }


    public function ApiGetCustodio(){

        $custodio=DB::table('custodio')
        ->where('Estado','=','1')->get();

        return response()->json($custodio);

    }

}
