<?php

namespace activofijo\Http\Controllers;

use DB;
use Carbon\Carbon;
use activofijo\Categoria;
use activofijo\Log_Change;
use Illuminate\Http\Request;


use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Controllers\Controller;
use activofijo\Http\Requests\CategoriaFormRequest;


class CategoriaController extends Controller
{

    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));
            $categoria=DB::table('categoria as c')
            ->join('rubro as r','r.CodRubro','=','c.CodRubro')
            ->select('c.CodCategoria','c.Nombre','r.Descripcion as rubro')
            ->where('c.Nombre','LIKE','%'.$query.'%')
            ->orwhere('r.Descripcion','LIKE','%'.$query.'%')
            ->orderBy('c.CodCategoria','asc')
            ->paginate(10);
            return view('almacen.categoria.index',["categoria"=>$categoria,"searchText"=>$query]);
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
        $categoria->Descripcion = $request->get('descripcion');
        $categoria->save();

        $sql = "SELECT max(id) as id
                FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Registro una nueva categoria';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

        return Redirect::to("almacen/categoria");
        //dd($request->all());
    }


    public function show($id)
    {
        return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }


    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        $rubro=DB::table('Rubro')->get();
        return view("almacen.categoria.edit",["categoria"=>$categoria,"rubro"=>$rubro]);
    }


    public function update(CategoriaFormRequest $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $mayuscula = strtoupper($request->get('nombre'));
        $categoria->Nombre = $mayuscula;
        $categoria->CodRubro = $request->get('codrubro');
        $categoria->update();

        $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Actualizo el registro de una categoria';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


        return Redirect::to('almacen/categoria');
    }


    public function destroy($id)
    {
        $categoria = Categoria::where('CodCategoria','=',$id)->first();
        $categoria->delete();

        $log = new Log_Change;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Elimino el registro de una categoria';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


        return Redirect::to('almacen/categoria');
    }

    public function crearPDF(){

      $vistaUrl = "reportes.categoria";
       $categoria=DB::table('categoria as c')
            ->join('rubro as r','r.CodRubro','=','c.CodRubro')
            ->select('c.CodCategoria','c.Nombre','r.Descripcion as rubro')
            ->orderBy('c.CodCategoria','asc')->get();
      $data = $categoria;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-categoria.pdf');
    }
    
    
    
        
    public function getApiCategoria(){
        $categoria=DB::table('categoria as c')
        ->orderBy('c.CodCategoria','asc')->get();
        return response()->json($categoria,200);
    }
}
