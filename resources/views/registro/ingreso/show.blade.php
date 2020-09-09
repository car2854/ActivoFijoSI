@extends('layouts.principal')
@section('contenido')
    
    
    <div class="row col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                            <label for="nroadquisicion">Nro de Ingreso</label>
                            <p>{{$ingreso->NroAdquisicion}}</p>
                    </div>
                </div>
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <p>{{$ingreso->Fecha}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                    <label>Proveedor</label>
                        <p>{{$ingreso->Nombre.' '.$ingreso->Apellido}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                        <label>Almacen</label>
                            <p>{{$ingreso->NroAlmacen}}</p>
                    </div>
            </div>
    </div>

<div class="row col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
        <div class="panel panel-primary">
            <div class="panel-body">
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th>Categoria</th>
                                    <th>cantidad</th>
                                    <th>precio</th>
                                    <th>subtotal</th>
                                </thead>
                                <tbody>
                                    @foreach ($detalles as $det)
                                    <tr>
                                    <th>{{$det->NombreCategoria}}</th>
                                    <th>{{$det->Cantidad}}</th>
                                    <th>{{$det->Precio}}</th>
                                    <th>{{$det->Precio * $det->Cantidad}}</th>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">Bs {{$ingreso->PrecioTotal}} </h4></th>
                                </tfoot>
                            </table>
                        </div>  
            </div>
        </div>    
</div>

@endsection