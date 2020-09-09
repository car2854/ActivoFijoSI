<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoriaMovilController extends Controller
{
  public function index(Request $request){

    $query = trim($request->get('CodRubro'));
    $bien=DB::table('categoria')->where('CodRubro','=',$query)
    ->select('CodCategoria','Nombre')
    ->get();
    return response()->json($bien,200);
  }
}
