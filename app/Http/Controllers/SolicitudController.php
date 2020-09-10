<?php

namespace activofijo\Http\Controllers;

use DB;


use Response;
use Carbon\Carbon;
use activofijo\Rubro;
use activofijo\Custodio;
use activofijo\Solicitud;
use activofijo\Log_Change;
use activofijo\Responsable;
use Illuminate\Http\Request;

use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Controllers\Controller;
use activofijo\Http\Requests\SolicitudFormRequest;



class SolicitudController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));
            $solicitud=DB::table('solicitud as s')
            ->join('custodio as c','c.CodCustodio','=','s.CodCustodio')
            ->join('responsable as r','r.CodResponsable','=','s.CodResponsable')
            ->select('s.NroSolicitud','s.FechaHora','c.Nombre as NombreCustodio','r.Nombre as NombreResponsable')
            ->where('c.Nombre','LIKE','%'.$query.'%')
            ->orwhere('r.Nombre','LIKE','%'.$query.'%')
            ->orderBy('s.NroSolicitud','asc')
            ->paginate(10);

            return View('solicitud.solicitud.index',["solicitud"=>$solicitud,"searchText"=>$query]);
        }
    }
    public function create(){
        $custodio = DB::table('custodio')->where('Estado','=','1')->get();
        $responsable= DB::table('responsable')
        ->where('Estado','=','1')
        ->get();
        return view("solicitud.solicitud.create",['custodio'=> $custodio,'responsable'=> $responsable]);
    }
    public function store(SolicitudFormRequest $request){
        $solicitud = new Solicitud;
        $solicitud->FechaHora = $request->get('FechaHora');
        $solicitud->CodCustodio = $request->get('CodCustodio');
        $solicitud->CodResponsable = $request->get('CodResponsable');
        $rubro->save();

        $sql = "SELECT max(id) as id
                FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Realizo una solicitud';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


        return Redirect::to("solicitud/solicitud");
    }
    public function show($id){
        return view("almacen.rubro.show",["rubro"=>Rubro::findOrFail($id)]);
    }
    public function edit($id){
        return view("solicitud.solicitud.edit",["solicitud"=>Solicitud::findOrFail($id)]);
    }
    public function update(SolicitudFormRequest $request,$id){
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->FechaHora = $request->get('FechaHora');
        $solicitud->CodCustodio = $request->get('CodCustodio');
        $solicitud->CodResponsable = $request->get('CodResponsable');
        $solicitud->update();
        return Redirect::to('solicitud/solicitud');
    }
    public function destroy($id){
        $rubro = Rubro::where('CodRubro','=',$id)->first();
        $rubro->delete();
        return Redirect::to('almacen/rubro');
    }
}
