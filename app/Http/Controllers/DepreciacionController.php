<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use activofijo\Depreciacion;
use activofijo\Bien;
use datetime ;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Requests\CategoriaFormRequest;


class DepreciacionController extends Controller
{

    public function index(Request $request)
    {
        if($request){
            $bienes = DB::table('bien as b')
            ->where('b.EstadoBien','=','activo')
            ->join('rubro as r','b.CodRubro','=','r.CodRubro')
            ->join('departamento as d','d.CodDepartamento','=','b.UbicacionDepartamento')
            ->join('categoria as cat','b.CodCategoria','=','cat.CodCategoria')
            ->orderby('b.ValorCompra','desc')
            ->select('b.CodBien','b.Nombre','cat.Nombre as NombreCategoria','b.ValorCompra','r.vidautil','b.FechaAdquisicion','d.Descripcion')
            ->get();

            $date2 = new DateTime("now");
            $cont = 0;
            $arrays = array();
            while($cont < count($bienes)){
                $dateBaseDatos = new DateTime($bienes[$cont]->FechaAdquisicion);
                $diff = $date2->diff($dateBaseDatos);
                $day = $diff->days;
                $deprecia = ($day * 100) / ($bienes[$cont]->vidautil * 365) ;

                $arrays[$cont] = array(
                    'CodBien' => $bienes[$cont]->CodBien,
                    'Nombre' => $bienes[$cont]->Nombre,
                    'categoria' => $bienes[$cont]->NombreCategoria,
                    'ValorCompra'=> $bienes[$cont]->ValorCompra,
                    'vidautil'=> $bienes[$cont]->vidautil,
                    'Descripcion'=> $bienes[$cont]->Descripcion,
                    'FechaAdquisicion'=> $bienes[$cont]->FechaAdquisicion,
                    'depreciacion' => bcdiv($deprecia, '1', 2)
                );
                $cont=$cont+1;
            }
            //return dd($arrays);
            return view('depreciacion.depreciacion.index',["bienes"=> $arrays]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rubro=DB::table('Rubro')->get();
        return view("almacen.categoria.create",["rubro"=>$rubro]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaFormRequest $request)
    {

        $mayuscula = strtoupper($request->get('nombre'));
        $categoria = new Categoria;
        $categoria->Nombre = $mayuscula;
        $categoria->CodRubro = $request->get('codrubro');
        $categoria->save();
        return Redirect::to("almacen/categoria");
        //dd($request->all());
    }

    public function crearPDF(){

      $vistaUrl = "reportes.depreciacion";
      $bienes = DB::table('bien as b')
            ->where('b.EstadoBien','=','activo')
            ->join('rubro as r','b.CodRubro','=','r.CodRubro')
            ->join('departamento as d','d.CodDepartamento','=','b.UbicacionDepartamento')
            ->join('categoria as cat','b.CodCategoria','=','cat.CodCategoria')
            ->orderby('b.ValorCompra','desc')
            ->select('b.CodBien','b.Nombre','cat.Nombre as NombreCategoria','b.ValorCompra','r.vidautil','b.FechaAdquisicion','d.Descripcion')
            ->get();

            $date2 = new DateTime("now");
            $cont = 0;
            $arrays = array();
            while($cont < count($bienes)){
                $dateBaseDatos = new DateTime($bienes[$cont]->FechaAdquisicion);
                $diff = $date2->diff($dateBaseDatos);
                $day = $diff->days;
                $deprecia = ($day * 100) / ($bienes[$cont]->vidautil * 365) ;
                $arrays[$cont] = array(
                    'CodBien' => $bienes[$cont]->CodBien,
                    'ValorCompra'=> $bienes[$cont]->ValorCompra,
                    'vidautil'=> $bienes[$cont]->vidautil,
                    'Descripcion'=> $bienes[$cont]->Descripcion,
                    'FechaAdquisicion'=> $bienes[$cont]->FechaAdquisicion,
                    'depreciacion' => bcdiv($deprecia, '1', 2)
                );
                $cont=$cont+1;
            }
      $data = $arrays;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-depreciacion.pdf');
    }
}
