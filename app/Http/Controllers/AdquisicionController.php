<?php

namespace activofijo\Http\Controllers;

use DB;
use auth;
use Response;
use Carbon\Carbon;
use activofijo\Rubro;
use activofijo\Categoria;
use activofijo\Proveedor;
use activofijo\Log_Change;
use activofijo\Adquisicion;
use Illuminate\Http\Request;
use Illuminate\Auth\SessionGuard;
use activofijo\DetalleAdquisicion;


use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Collection;
use activofijo\Http\Requests\AdquisicionFormRequest;



class AdquisicionController extends Controller
{
    public function  __construct(){

    }
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));
            $ingreso=DB::table('adquisicion as ad')
            ->join('almacen as a','a.NroAlmacen','=','ad.NroAlmacen')
            ->join('proveedor as p','p.CodProveedor','=','ad.CodProveedor')
            //->join('DetalleAdquisicion as da','da.NroAdquisicion','=','ad.NroAdquisicion')
            ->select('ad.NroAdquisicion','ad.Fecha','p.Nombre as Nombre','p.Apellido as Apellido','a.Direccion as NroAlmacen')
            ->where('NroAdquisicion','LIKE','%'.$query.'%')
            ->orderBy('NroAdquisicion','asc')
            ->paginate(10);
            return view('registro.ingreso.index',["ingreso"=>$ingreso,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedor=DB::table('proveedor')->get();
        $almacen=DB::table('almacen')->get();
        $categoria = DB::table('categoria')->get();
        $rubro = DB::table('rubro')->get();

        return view("registro.ingreso.create",["proveedor"=>$proveedor,"almacen"=>$almacen
        ,"categoria"=>$categoria,"rubro"=>$rubro]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdquisicionFormRequest $request)
    {
        try{
            DB::beginTransaction();
            $ingreso = new Adquisicion;
            $a =$request->get('nroadquisicion');
            $ingreso->NroAdquisicion = $a;
            $ingreso->Fecha = $request->get('fecha');
            $ingreso->PrecioTotal = 0;
            $ingreso->CodProveedor = $request->get('codproveedor');
            $ingreso->NroAlmacen = $request->get('nroalmacen');
            $ingreso->save();


            $sql = "SELECT max(NroDetalleAdquisicion) as id
            FROM detalleadquisicion;";
            $consulta = DB::select($sql);
            $valorId = $consulta[0]->id + 1;

            $codcategoria = $request->get('codcategoria');
            $cantidad= $request->get('cantidad');
            $precio= $request->get('precio');
            $cont=0;
            $PrecioTotal = 0;
            while($cont < count($codcategoria)){
                $detalle = new DetalleAdquisicion;
                $detalle->NroDetalleAdquisicion = $valorId;
                $detalle->NroAdquisicion = $a;
                $detalle->CodCategoria = $codcategoria[$cont];
                $detalle->Cantidad = $cantidad[$cont];
                $detalle->Precio = $precio[$cont];
                $PrecioTotal+= $cantidad[$cont] * $precio[$cont];
                $detalle->save();
                $cont = $cont+1;
                $valorId = $valorId + 1;
            }
            $afectador = DB::update('update adquisicion set PrecioTotal = '.$PrecioTotal .' where NroAdquisicion = '.$a.'');


            $sql = "SELECT max(id) as id
            FROM log_change;";
            $consulta = DB::select($sql);

            $log = new Log_Change;
            $log->id = $consulta[0]->id + 1;
            $log->id_user = auth()->user()->id;
            $log->accion = 'Registro una nueva adquisicion';
            $now = Carbon::now();
            $log->fechaAccion = $now->format('d/m/Y H:i:s');

            $log->save();

            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            return $e;
        }


        return Redirect::to("adquisicion/adquisicion");
    }


    public function show($id)
    {
        $ingreso=DB::table('adquisicion as ad')
            ->join('almacen as a','a.NroAlmacen','=','ad.NroAlmacen')
            ->join('proveedor as p','p.CodProveedor','=','ad.CodProveedor')
            ->join('detalleadquisicion as da','da.NroAdquisicion','=','ad.NroAdquisicion')
            ->select('ad.NroAdquisicion','ad.Fecha','ad.PrecioTotal','p.Nombre as Nombre','p.Apellido as Apellido','a.Direccion as NroAlmacen',DB::raw('sum(da.Cantidad * da.Precio) as total'))
            ->where('ad.NroAdquisicion','=',$id)
            ->groupBy('ad.NroAdquisicion','ad.Fecha','p.Nombre','p.Apellido','a.Direccion','ad.PrecioTotal')
            ->first();

        $detalles= DB::table('detalleadquisicion as da')
        ->join('categoria as c','c.CodCategoria','=','da.CodCategoria')
        ->select('c.Nombre as NombreCategoria','da.Cantidad','da.Precio')
        ->where('da.NroAdquisicion','=',$id)
        ->get();
        return view("registro.ingreso.show",["ingreso"=>$ingreso,'detalles'=>$detalles]);
    }


    public function edit($id)
    {
       /* $ingreso = Ingreso::findOrFail($id);
        $detalleingreso=DB::table('DetalleIngreso')->get();
        return view("almacen.categoria.edit",["categoria"=>$categoria,"rubro"=>$rubro]);
        */
    }


    public function update(AdquisicionFormRequest $request, $id)
    {
        /*$categoria = Categoria::findOrFail($id);
        $mayuscula = strtoupper($request->get('nombre'));
        $categoria->Nombre = $mayuscula;
        $categoria->CodRubro = $request->get('codrubro');
        $categoria->Descripcion = $request->get('descripcion');

        $categoria->update();
        return Redirect::to('almacen/categoria');*/
    }


    public function destroy($id)
    {
        /*$categoria = Categoria::where('CodCategoria','=',$id)->first();
        $categoria->delete();
        return Redirect::to('almacen/categoria');*/
    }


    public function crearPDF(){

      $vistaUrl = "reportes.adquisicion";
      $ingreso=DB::table('adquisicion as ad')
            ->join('almacen as a','a.NroAlmacen','=','ad.NroAlmacen')
            ->join('proveedor as p','p.CodProveedor','=','ad.CodProveedor')

            ->select('ad.NroAdquisicion','ad.Fecha','p.Nombre as Nombre','p.Apellido as Apellido','a.Direccion as NroAlmacen')
            ->orderBy('NroAdquisicion','asc')
      ->get();
      $data = $ingreso;
      $date = date('Y-m-d');
      $view = \View::make($vistaUrl, compact('data','date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);

      return $pdf->stream('reporte-adquisicion.pdf');
    }
}

