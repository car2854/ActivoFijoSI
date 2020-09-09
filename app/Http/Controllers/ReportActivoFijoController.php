<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReportActivoFijoController extends Controller
{

    private $bien;
    private $categoria;
    private $departamento;
    private $valorCompraInicial;
    private $valorCompraFinal;
    private $fechaInicio;
    private $fechaFin;

    public function index(Request $request){
        if ($request){

            $NombreBien = DB::table('bien')
            ->where('EstadoBien','=','activo')
            ->select('CodBien','Nombre')->get();

            $NombreCategoria = DB::table('categoria')
            ->select('CodCategoria','Nombre')->get();

            $Departamento = DB::table('departamento')
            ->where('Estado','=','1')
            ->select('CodDepartamento','Descripcion')->get();


            return view('ReportesDinamicos.ActivosFijos.index',["NombreBien"=>$NombreBien,"NombreCategoria"    =>$NombreCategoria,"Departamento"=>$Departamento]);




        }

    }

    public function getInformation(Request $request){

      if ($request){

        $this->bien=trim($request->get('NombreBien'));
        $this->categoria=trim($request->get('NombreCategoria'));
        $this->departamento=trim($request->get('Departamento'));
        $this->valorCompraInicial=trim($request->get('ValorCompraInicial'));
        $this->valorCompraFinal=trim($request->get('ValorCompraFinal'));
        $this->fechaInicio=trim($request->get('FechaInicio'));
        $this->fechaFin=trim($request->get('FechaFin'));

        if ($this->bien == 'Todos'){
            $this->bien = "";
        }
        if ($this->categoria == 'Todos'){
            $this->categoria = "";
        }
        if ($this->departamento == 'Todos'){
            $this->departamento = "";
        }
        if ($this->valorCompraInicial==''){
            $this->valorCompraInicial = '0.0';
        }
        if ($this->valorCompraFinal==''){
            $this->valorCompraFinal = '9999999.99';
        }
        if ($this->fechaInicio == ''){
            $this->fechaInicio = '0000-01-01';
        }else{
            $anio = substr($fechaInicio,0,4);
            $mes = substr($fechaInicio,5,2);
            $dia = substr($fechaInicio,8,2);
            $this->fechaInicio = $anio . '-' . $mes . '-' . $dia;
        }
        if ($this->fechaFin == ''){
            $this->fechaFin = '3000-12-12';
        }else{
            $anio = substr($fechaFin,0,4);
            $mes = substr($fechaFin,5,2);
            $dia = substr($fechaFin,8,2);
            $this->fechaFin = $anio . '-' . $mes . '-' . $dia;
        }

        $ListaBien = DB::table('bien')->where('bien.Nombre','LIKE','%'.$this->bien.'%')
        ->where('bien.EstadoBien','=','activo')
        ->join('departamento','departamento.CodDepartamento','=','bien.UbicacionDepartamento')
        ->join('categoria','categoria.CodCategoria','=','bien.CodCategoria')
        ->where('categoria.Nombre','LIKE','%'.$this->categoria.'%')
        ->where('departamento.Descripcion','LIKE','%'.$this->departamento.'%')
        ->whereBetween('bien.ValorCompra', [$this->valorCompraInicial, $this->valorCompraFinal])
        ->whereBetween('bien.FechaAdquisicion', [$this->fechaInicio,$this->fechaFin])
        ->select('bien.CodBien','bien.Nombre as NombreBien','bien.ValorCompra','bien.FechaAdquisicion','departamento.Descripcion','categoria.Nombre as NombreCategoria')->get();



        return view('ReportesDinamicos.ActivosFijos.viewAjax',["ListaBien"=>$ListaBien]);

      }

    }

      public function getPDF($NombreBien,$NombreCategoria,$Departamento,$ValorCompraInicial,$ValorCompraFinal,$FechaInicio,$FechaFin){


              $this->bien=$NombreBien;
              $this->categoria=$NombreCategoria;
              $this->departamento=$Departamento;
              $this->valorCompraInicial=$ValorCompraInicial;
              $this->valorCompraFinal=$ValorCompraFinal;
              $this->fechaInicio=$FechaInicio;
              $this->fechaFin=$FechaFin;

              if ($this->bien == 'Todos'){
                  $this->bien = "";
              }
              if ($this->categoria == 'Todos'){
                  $this->categoria = "";
              }
              if ($this->departamento == 'Todos'){
                  $this->departamento = "";
              }
              if ($this->valorCompraInicial=='0'){
                  $this->valorCompraInicial = '0.0';
              }
              if ($this->valorCompraFinal=='0'){
                  $this->valorCompraFinal = '9999999.99';
              }
              if ($this->fechaInicio == '0'){
                  $this->fechaInicio = '0000-01-01';
              }else{
                  $anio = substr($this->fechaInicio,0,4);
                  $mes = substr($this->fechaInicio,5,2);
                  $dia = substr($this->fechaInicio,8,2);
                  $this->fechaInicio = $anio . '-' . $mes . '-' . $dia;
              }
              if ($this->fechaFin == '0'){
                  $this->fechaFin = '3000-12-12';
              }else{
                  $anio = substr($this->fechaFin,0,4);
                  $mes = substr($this->fechaFin,5,2);
                  $dia = substr($this->fechaFin,8,2);
                  $this->fechaFin = $anio . '-' . $mes . '-' . $dia;
              }

              $vistaUrl = "ReportesDinamicos.ActivosFijos.descarga";

              $Lista = DB::table('bien')->where('bien.Nombre','LIKE','%'.$this->bien.'%')
                    ->where('bien.EstadoBien','=','activo')
                    ->join('departamento','departamento.CodDepartamento','=','bien.UbicacionDepartamento')
                    ->join('categoria','categoria.CodCategoria','=','bien.CodCategoria')
                    ->where('categoria.Nombre','LIKE','%'.$this->categoria.'%')
                    ->where('departamento.Descripcion','LIKE','%'.$this->departamento.'%')
                    ->whereBetween('bien.ValorCompra', [$this->valorCompraInicial, $this->valorCompraFinal])
                    ->whereBetween('bien.FechaAdquisicion', [$this->fechaInicio,$this->fechaFin])
                    ->select('bien.CodBien','bien.Nombre as NombreBien','bien.ValorCompra','bien.FechaAdquisicion','departamento.Descripcion','categoria.Nombre as NombreCategoria')->get();


              $data = $Lista;
              $date = date('Y-m-d');
              $view = \View::make($vistaUrl, compact('data','date'))->render();
              $pdf = \App::make('dompdf.wrapper');
              $pdf->loadHTML($view);

              return $pdf->stream('reporte-activoFijo.pdf');

      }
}
