<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DetalleBienMovilController extends Controller
{
  public function index(Request $request){
    if ($request){
      $query=trim($request->get('codbien'));
      $almacen=DB::table('bien')->where('bien.CodBien','LIKE','%'.$query.'%')
      ->join('departamento','departamento.CodDepartamento','=','bien.UbicacionDepartamento')
      ->join('custodio','custodio.CodDepartamento','=','departamento.CodDepartamento')
      ->select('bien.CodBien','bien.Nombre','bien.FechaAdquisicion','bien.ValorCompra','bien.Estado','bien.UbicacionDepartamento','bien.UbicacionAlmacen','bien.CodCategoria','bien.estadobien','bien.CodRubro','departamento.Descripcion as Ubicacion','custodio.Nombre as NombreCustodio')->get();

      return response()->json($almacen,200);
    }
  }
}
