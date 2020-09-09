<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $consulta=DB::table('log_change')
        ->where('id_user','=',auth()->user()->id)
        ->select('accion','fechaAccion')
        ->orderBy('id','desc')
        ->get(5);

        return view('layouts.bienvenida',["consulta"=>$consulta]);
    }
}
