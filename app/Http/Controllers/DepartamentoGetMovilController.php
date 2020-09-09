<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DepartamentoGetMovilController extends Controller
{
  public function index(){

    $departamento=DB::table('departamento')->get();
    return response()->json($departamento,200);

  }
}
