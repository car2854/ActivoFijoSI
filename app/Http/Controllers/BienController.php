<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use activofijo\Bien;
use activofijo\Categoria;
use activofijo\Rubro;
use activofijo\Departamento;
use activofijo\Almacen;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Requests\BienFormRequest;

use activofijo\Log_Change;
use Illuminate\Auth\SessionGuard;
use Carbon\Carbon;


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
        dd($categorias);
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

    	$log = new Log_Change;
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

}
