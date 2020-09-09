@extends('layouts.principal')
@section('contenido')


    <!--<div class="box">-->
            <div class="box-header with-border">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h3>Listado de Solicitudes
                            <a href="solicitud/create"><button type="button" class="btn btn-success">Nuevo</button></a>
                        </h3>
                        @include('solicitud.solicitud.search')
                </div>
    
              <!--<div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>-->
            </div>
            <div class="box-body">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th>Nro Solicitud</th>
                                <th>Fecha</th>
                                <th>Nombre Custodio</th>
                                <th>Nombre Responsable</th>
                                <th>Opciones</th>
                            </thead>
                            @foreach($solicitud as $so)
                            <tr>
                                <td>{{$so->NroSolicitud}}</td>
                                <td>{{$so->FechaHora}} </td>
                                <td>{{$so->NombreCustodio}} </td>
                                <td>{{$so->NombreResponsable}} </td>
                                
                                <td>
                                    <a href="{{URL::action('SolicitudController@edit',$so->NroSolicitud)}}"><button class="btn btn-info" > Editar</button></a>
                                    <a href="" data-target="#modal-delete-{{$so->NroSolicitud}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
                                </td>
                            </tr>  
                            @include('solicitud.solicitud.modal') 
                            @endforeach
                        </table>
                    </div>
                    {{$solicitud->render()}}
                <!--</div>
            </div>-->
            <!-- /.box-body -->
            
            
            <div class="box-footer">
              Footer
            </div>
            <!-- /.box-footer-->
          </div>
@endsection