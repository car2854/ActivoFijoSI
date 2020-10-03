<?php

namespace activofijo\Http\Controllers;
use datetime ;
use DB;

use Illuminate\Http\Request;

class DepreciacionMovilController extends Controller
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
            return response()->json($arrays, 200);
        }
    }
}
