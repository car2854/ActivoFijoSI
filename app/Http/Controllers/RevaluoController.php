<?php

namespace activofijo\Http\Controllers;

use DB;

use Carbon\Carbon;
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

            $Revaluo=DB::table('revisiontecnica')->where('revisiontecnica.CodBien','LIKE','%'.$query.'%')
            ->join('bien','bien.CodBien','=','revisiontecnica.CodBien')
            ->join('operador','operador.CodOperador','=','revisiontecnica.CodOperador')
            ->join('revaluo','revaluo.NroRevision','=','revisiontecnica.NroRevision')
            ->join('custodio','custodio.CodCustodio','=','custodio.CodCustodio')
            ->select('bien.CodBien','bien.Nombre as NombreBien','custodio.Nombre as NombreCustodio','Operador.Nombre as NombreOperador','revaluo.Estado','revaluo.FechaHora','revaluo.Monto','revaluo.Descripcion')
            ->orderBy('revisiontecnica.CodBien','desc')
            ->paginate(7);

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


        // $custodio = Bien::findOrFail($id);
        // $custodio->CodCustodio = $request->get('codigo');
    	// $custodio->Nombre = $request->get('nombre');
    	// $custodio->Apellido = $request->get('apellido');
    	// $custodio->Telefono = $request->get('telefono');
        // $custodio->CodDepartamento = $request->get('departamento');
        // $custodio->update();


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
}
