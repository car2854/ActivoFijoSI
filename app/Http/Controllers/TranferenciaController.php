<?php

namespace activofijo\Http\Controllers;

use DB;
use Carbon\Carbon;
use activofijo\Bien;
use activofijo\Custodio;
use activofijo\Categoria;
use activofijo\Ubicacion;
use activofijo\Log_Change;
use activofijo\Responsable;
use activofijo\Tranferencia;



use Illuminate\Http\Request;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Controllers\Controller;
use activofijo\Http\Requests\CategoriaFormRequest;
use activofijo\Http\Requests\TranferenciaFormRequest;


class TranferenciaController extends Controller
{
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));
            $custodio = DB::table('custodio')->get();
            $tranferencia=DB::table('tranferencia as t')
            ->join('custodio as c','t.CodCustodioDestino','=','c.CodCustodio')
            //->join('custodio as c1','t.CodCustodioDestino','=','c.CodCustodio')
            ->join('responsable as r','t.CodResponsable','=','r.CodResponsable')
            ->join('bien as b','t.CodBien','=','b.CodBien')
            ->select('t.NroTranferencia','t.FechaTranferencia','c.Nombre as nombrec1','r.Nombre as nombrer')
            ->where('t.NroTranferencia','LIKE','%'.$query.'%')
            //->orwhere('r.Descripcion','LIKE','%'.$query.'%')
            ->orderBy('t.NroTranferencia','asc')
            ->paginate(10);
            return view('tranferencia.transferencia.index',["tranferencia"=>$tranferencia,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ubicacion=DB::table('ubicacion')->get();
        $custodio=DB::table('custodio')->get();
        $responsable=DB::table('responsable')->get();
        $bien = DB::table('bien')->get();
        return view("tranferencia.transferencia.create",["ubicacion"=>$ubicacion,"custodio"=>$custodio,"responsable"=>$responsable,"bien"=>$bien]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store( TranferenciaFormRequest $request)
    {

       // $mayuscula = strtoupper($request->get('nombre'));
        $tranferencia = new Tranferencia;
        $tranferencia->NroTranferencia = $request->get('nrotransferencia');
        $tranferencia->FechaTranferencia = $request->get('date');
        $tranferencia->CodCustodioOrigen = $request->get('cusorigen');
        $tranferencia->CodCustodioDestino = $request->get('cusdestino');
        $tranferencia->CodResponsable = $request->get('responsable');
        $tranferencia->CodBien = $request->get('bien');
        $tranferencia->EstadoBien = "Nuevo";
        $tranferencia->save();


        $sql = "SELECT max(id) as id
                FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Realizo una transferencia';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

        return Redirect::to("tranferencia/transferencia");
        //dd($request->all());
    }


    public function show($id)
    {
      //  return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }


    public function edit($id)
    {
       /* $categoria = Categoria::findOrFail($id);
        $rubro=DB::table('Rubro')->get();
        return view("almacen.categoria.edit",["categoria"=>$categoria,"rubro"=>$rubro]);*/
    }


    public function update(CategoriaFormRequest $request, $id)
    {
        $tranferencia = Tranferencia::findOrFail($id);
        $tranferencia->NroTransferencia = $request->get('nrotransferencia');
        $tranferencia->FechaTranferencia = $request->get('date');
        $tranferencia->CodRubro = $request->get('cusorigen');
        $tranferencia->CodRubro = $request->get('cusdestino');
        $tranferencia->CodRubro = $request->get('responsable');
        $tranferencia->CodRubro = $request->get('bien');
        $tranferencia->update();
        return Redirect::to("tranferencia/transferencia");
    }


    public function destroy($id)
    {
       /* $categoria = Categoria::where('CodCategoria','=',$id)->first();
        $categoria->delete();
        return Redirect::to('almacen/categoria');*/
    }

    public function crearPDF(){

      $vistaUrl = "reportes.tranferencia";
      $custodio = DB::table('custodio')->get();
            $tranferencia=DB::table('tranferencia as t')
            ->join('custodio as c','t.CodCustodioDestino','=','c.CodCustodio')
            //->join('custodio as c1','t.CodCustodioDestino','=','c.CodCustodio')
            ->join('responsable as r','t.CodResponsable','=','r.CodResponsable')
            ->join('bien as b','t.CodBien','=','b.CodBien')
            ->select('t.NroTranferencia','t.FechaTranferencia','c.Nombre as nombrec1','r.Nombre as nombrer')
            ->orderBy('t.NroTranferencia','asc')
      ->get();
      $data = $tranferencia;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-tranferencia.pdf');
    }
    
    
    public function ApiGetTraferencia(){

        $tranferencia=DB::table('tranferencia as t')
        ->join('custodio as c','t.CodCustodioDestino','=','c.CodCustodio')
        //->join('custodio as c1','t.CodCustodioDestino','=','c.CodCustodio')
        ->join('responsable as r','t.CodResponsable','=','r.CodResponsable')
        ->join('bien as b','t.CodBien','=','b.CodBien')
        ->select('t.NroTranferencia','t.FechaTranferencia','c.Nombre as nombrec1','r.Nombre as nombrer')
        ->orderBy('t.NroTranferencia','asc')->get();

        return response()->json($tranferencia);

    }
    
    public function ApiPostTranferencia(Request $request){
        
        $Fecha = $request->get('fecha');
        
        $tranferencia = new Tranferencia;
        $tranferencia->NroTranferencia = $request->get('nroTranferencia');
        $tranferencia->FechaTranferencia = substr($Fecha,0,10);
        $tranferencia->CodCustodioOrigen = $request->get('custodioOrigen');
        $tranferencia->CodCustodioDestino = $request->get('custodioDestino');
        $tranferencia->CodResponsable = $request->get('responsable');
        $tranferencia->CodBien = $request->get('bien');
        $tranferencia->EstadoBien = "Nuevo";
        $tranferencia->save();

        //return response()->json($request->get('usuario'));
        $sql = "SELECT max(id) as id
                FROM log_change;";
        $consulta = DB::select($sql);
        
        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = $request->get('idUsuario');
        $log->accion = 'Realizo una transferencia desde el movil';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

        
        return response()->json(1);
        
    }

}
