<?php

namespace activofijo\Http\Controllers;

use DB;

use Carbon\Carbon;
use activofijo\Bien;
use activofijo\Revaluo;
use activofijo\Operador;
use activofijo\Log_Change;
use Illuminate\Http\Request;
use activofijo\Http\Requests;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Controllers\Controller;
use activofijo\Http\Requests\RevaluoFromRequest;
use activofijo\Http\Requests\OperadorFormRequest;

class RevaluoController extends Controller
{
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));

            $Revaluo=DB::table('revisiontecnica')
            ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
            ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
            ->join('revaluo','revaluo.NroRevision','=','revisiontecnica.NroRevision')
            ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
            ->select('bien.CodBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','Operador.Nombre as NombreOperador','revaluo.Estado','revaluo.FechaHora','revaluo.Monto','revaluo.Descripcion')
            ->orderBy('revisiontecnica.CodBien','desc')
            ->get();

            return view('RevisionTecnica.Revaluo.index',["revaluo"=>$Revaluo,"searchText"=>$query]);
        }
    }

    public function create($NroR){
        return view("RevisionTecnica.Revaluo.Create",["NroR"=>$NroR]);
    }
    //almacenar el objeto POST
    public function store(RevaluoFromRequest $request){

        $sql = "SELECT max(NroRevaluo) as id
        FROM revaluo;";
        $consulta = DB::select($sql);

        $rev=new revaluo;
        $rev->NroRevaluo = $consulta[0]->id + 1;
        $rev->NroRevision = $request->get('NroRevision');
        $rev->Estado = $request->get('Estado');
        $now = new \DateTime();
        echo $now->format('Y-m-d H:i:s');
        $rev->FechaHora = $now;
        $rev->Monto = $request->get('Monto');
        $rev->Descripcion = $request->get('Descripcion');
        $rev->save();

        $sql = "SELECT bien.CodBien as id
                    FROM revisiontecnica,bien
                    WHERE revisiontecnica.CodBien = bien.CodBien and revisiontecnica.NroRevision = ?;";

        $consulta = DB::select($sql,array($request->get('NroRevision')));

        $ActualizarValor = Bien::findOrFail($consulta[0]->id);
        $ActualizarValor->NuevoValorRevaluo = $request->get('Monto');
        $ActualizarValor->update();

        $sql = "SELECT max(id) as id
        FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = auth()->user()->id;
        $log->accion = 'Realizo un revaluo';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();


        return Redirect::to('/RevisionTecnica/revisiontecnica');
    }

    public function show($id){
        //findOrFail solo mostrar la categoria $id
        return view("RevisionTecnica.Operador.Show",["operador"=>Operador::findOrFail($id)]);
    }

    public function edit($id){
        return view("RevisionTecnica.Operador.Edit",["operador"=>Operador::findOrFail($id)]);
    }

    public function update(OperadorFormRequest $request, $id){

        return Redirect::to('RevisionTecnica/Operador');
    }

    public function destroy($id){

        return Redirect::to('RevisionTecnica/Operador');
    }


    public function crearPDF(){

        $vistaUrl = "reportes.revaluo";

        //consulta
        $Revaluo=DB::table('revisiontecnica')
        ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
        ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
        ->join('revaluo','revaluo.NroRevision','=','revisiontecnica.NroRevision')
        ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
        ->select('bien.CodBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','Operador.Nombre as NombreOperador','revaluo.Estado','revaluo.FechaHora','revaluo.Monto','revaluo.Descripcion')
        ->orderBy('revisiontecnica.CodBien','desc')
        ->get();
        //fin consulta

        $data = $Revaluo;
        $date = date('Y-m-d');
        $view = \View::make($vistaUrl, compact('data','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('reporte-baja.pdf');
    }
    
    
    
    public function ApiGetRevaluo(){

        $Revaluo=DB::table('revisiontecnica')
        ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
        ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
        ->join('revaluo','revaluo.NroRevision','=','revisiontecnica.NroRevision')
        ->join('custodio','custodio.CodCustodio','=','revisiontecnica.CodCustodio')
        ->select('bien.CodBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','Operador.Nombre as NombreOperador','revaluo.Estado','revaluo.FechaHora','revaluo.Monto','revaluo.Descripcion')
        ->orderBy('revisiontecnica.CodBien','desc')
        ->get();

        return response()->json($Revaluo);
        
    }
    
    public function ApiPostRevaluo(Request $request){
    
        $sql = "SELECT max(NroRevaluo) as id
        FROM revaluo;";
        $consulta = DB::select($sql);

        $rev=new revaluo;
        $rev->NroRevaluo = $consulta[0]->id + 1;
        $rev->NroRevision = $request->get('idRevision');
        $rev->Estado = $request->get('estado');
        $now = new \DateTime();
        $now->format('Y-m-d H:i:s');
        $rev->FechaHora = $now;
        $rev->Monto = $request->get('monto');
        $rev->Descripcion = $request->get('descripcion');
        $rev->save();

        $sql = "SELECT bien.CodBien as id
                    FROM revisiontecnica,bien
                    WHERE revisiontecnica.CodBien = bien.CodBien and revisiontecnica.NroRevision = ?;";

        $consulta = DB::select($sql,array($request->get('idRevision')));

        $ActualizarValor = Bien::findOrFail($consulta[0]->id);
        $ActualizarValor->NuevoValorRevaluo = $request->get('monto');
        $ActualizarValor->update();

        $sql = "SELECT max(id) as id
        FROM log_change;";
        $consulta = DB::select($sql);

        $log = new Log_Change;
        $log->id = $consulta[0]->id + 1;
        $log->id_user = $request->get('idUsuario');
        $log->accion = 'Realizo un revaluo desde el movil';

        $now = Carbon::now();
        $log->fechaAccion = $now->format('d/m/Y H:i:s');

        $log->save();

        return response()->json(1);
    
    }
}
