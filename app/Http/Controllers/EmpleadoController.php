<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use activofijo\Custodio;
use activofijo\Operador;
use activofijo\Responsable;

class EmpleadoController extends Controller
{
    public function listarcustodio(){
        $lista = Custodio::where('Estado', 1)->get();

        return response()->json($lista, 200);
    }

    public function listarOperador(){
        $lista = Operador::where('Estado',1)->get();

        return response()->json($lista, 200);
    }

    public function listarResponsable(){
        $lista = Responsable::where('Estado',1)->get();

        return response()->json($lista, 200);
    }
}
