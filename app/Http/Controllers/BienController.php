<?php

namespace activofijo\Http\Controllers;

use DB;

use auth;
use Carbon\Carbon;
use activofijo\Bien;
use activofijo\Rubro;
use activofijo\Almacen;
use activofijo\Categoria;
use activofijo\Log_Change;
use activofijo\Departamento;

use Illuminate\Http\Request;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Controllers\Controller;
use activofijo\Http\Requests\BienFormRequest;


class BienController extends Controller
{


    public function getCategorias(Request $request, $id){
       if($request->ajax()){
            //$categorias = Categoria::categorias($id);
            $categorias = DB::table('categoria')->where('CodRubro','=',$id)->get();
            return response()->json($categorias);
        }
    }


    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));
            $bienes=DB::table('bien as b')
            ->join('categoria as c','b.CodCategoria','=','c.CodCategoria')
            ->join('rubro as r','b.CodRubro','=','r.CodRubro')
            ->join('departamento as d','b.UbicacionDepartamento','=','d.CodDepartamento')
            ->select('b.CodBien','b.Nombre','b.FechaAdquisicion','b.ValorCompra','d.Descripcion')
            ->where('c.Nombre','LIKE','%'.$query.'%')
            ->orwhere('r.Descripcion','LIKE','%'.$query.'%')
            ->orderBy('r.Descripcion','asc')
            ->orderBy('b.Nombre','asc')
            ->paginate(10);
            return view('bienes.bien.index',["bienes"=>$bienes,"searchText"=>$query]);
        }
    }

    public function create(){
    	$rubros = DB::table('rubro')->get();
        $categorias = DB::table('categoria')->get();
        $departamentos = DB::table('departamento')->where('Estado','=','1')->get();
        $almacenes = DB::table('almacen')->where('Estado','=','1')->get();
    	return view("bienes.bien.create",["rubros"=>$rubros, "categorias"=>$categorias,"departamentos"=>$departamentos,'almacenes'=>$almacenes]);

    }

    public function store(BienFormRequest $request){
    	$bien = new Bien;
        $bien->CodBien = $request->get('CodBien');
    	$bien->Nombre = $request->get('Nombre');
    	$bien->FechaAdquisicion = $request->get('FechaAdquisicion');
        $bien->ValorCompra = $request->get('ValorCompra');
        $bien->Estado = $request->get('Estado');
        $bien->EstadoBien = "activo";
        $bien->UbicacionDepartamento = $request->get('UbicacionDepartamento');
        $bien->UbicacionAlmacen = $request->get('UbicacionAlmacen');
        $bien->CodCategoria = $request->get('CodCategoria');
        $bien->CodRubro = $request->get('CodRubro');
    	$bien->save();


        $sql = "SELECT max(id) as id
                FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Registro un nuevo bien';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();



    	return Redirect('bienes/bien');

    }

    public function crearPDF(){

      $vistaUrl = "reportes.bien";
      $consulta = DB::table('bien as b')
            ->join('categoria as c','b.CodCategoria','=','c.CodCategoria')
            ->join('rubro as r','b.CodRubro','=','r.CodRubro')
            ->join('departamento as d','b.UbicacionDepartamento','=','d.CodDepartamento')
            ->select('b.CodBien','b.Nombre','b.FechaAdquisicion','b.ValorCompra','d.Descripcion')
            ->orderBy('b.CodBien','asc')
            ->get();
      $data = $consulta;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-bien.pdf');
    }





    public function ApiGetBien(){

        $bien=DB::table('bien')
        ->where('EstadoBien','=','activo')->get();

        return response()->json($bien);
    }
    
    
    public function ApiPostBien(Request $request){
        
        $Fecha = $request->get('fechaAdquisicion');
        
        $bien = new Bien;
        $bien->CodBien = $request->get('codigo');
    	$bien->Nombre = $request->get('nombre');
    	$bien->FechaAdquisicion = substr($Fecha,0,10);
        $bien->ValorCompra = $request->get('valorCompra');
        $bien->Estado = $request->get('estado');
        $bien->EstadoBien = "activo";
        $bien->UbicacionDepartamento = $request->get('departamentoDestino');
        $bien->UbicacionAlmacen = $request->get('almacenOrigen');
        $bien->CodCategoria = $request->get('categoria');
        $bien->CodRubro = $request->get('rubro');
    	$bien->save();


        $sql = "SELECT max(id) as id
                FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = $request->get('idUsuario');
        $log->accion = 'Registro un nuevo bien desde el movil';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

        
        return response()->json(1);
    }

}
