<?php

namespace activofijo\Http\Controllers;

use DB;

use Carbon\Carbon;
use activofijo\Proveedor;
use activofijo\Log_Change;
use Illuminate\Http\Request;


use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Controllers\Controller;
use activofijo\Http\Requests\ProveedorFormRequest;



class ProveedorController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
    		if($request){
    			$query = trim($request->get('searchText'));
    			$proveedor = DB::table('proveedor')
                ->where('Nombre','LIKE','%'.$query.'%')
                ->orderBy('Nombre','asc')
                ->paginate(5);
    			return view('empleado.proveedor.index',["proveedor"=>$proveedor,"searchText"=>$query]);
    		}
    }

    public function create(){
    	return view("empleado.proveedor.create");

    }

    public function store(ProveedorFormRequest $request){
    	$proveedor = new Proveedor;
        $proveedor->CodProveedor = $request->get('codigo');
    	$proveedor->Nombre = $request->get('nombre');
    	$proveedor->Apellido = $request->get('apellido');
        $proveedor->Telefono = $request->get('telefono');
        $proveedor->Direccion = $request->get('direccion');
        $proveedor->Estado=1;
        $proveedor->save();

        $sql = "SELECT max(id) as id
                FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Registro a un nuevo proveedor';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


    	return Redirect('empleado/proveedor');

    }


    public function show($id){
    	return view('empleado.proveedor.show',["proveedor"=>Proveedor::findOrFail($id)]);
    }

    public function edit($id){
    	return view('empleado.proveedor.edit',["proveedor"=>Proveedor::findOrFail($id)]);
    }

    public function update(ProveedorFormRequest $request, $id){
    	$proveedor = Proveedor::findOrFail($id);
        $proveedor->CodProveedor = $request->get('codigo');
    	$proveedor->Nombre = $request->get('nombre');
    	$proveedor->Apellido = $request->get('apellido');
        $proveedor->Telefono = $request->get('telefono');
        $proveedor->Direccion = $request->get('direccion');
        $proveedor->update();

                $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Actualizo el registro de un proveedor';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

    	return Redirect('empleado/proveedor');
    }


    public function destroy($id){
    	$proveedor = Proveedor::findOrFail($id);
        $proveedor->Estado = 0;
        $proveedor->update();
    	        $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Elimino el registro de un proveedor';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


    	return Redirect('empleado/proveedor');



    }

    public function crearPDF(){

      $vistaUrl = "reportes.proveedor";
      $proveedor = DB::table('proveedor')
      ->where('Estado','=','1')
      ->get();
      $data = $proveedor;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-proveedor.pdf');
    }
}
