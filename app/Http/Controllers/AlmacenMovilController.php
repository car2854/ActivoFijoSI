<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AlmacenMovilController extends Controller
{
  public function index(){

    $almacen=DB::table('almacen')
    ->where('Estado','=','1')
    ->select('NroAlmacen','Direccion')->get();
    return response()->json($almacen,200);
  }
}
