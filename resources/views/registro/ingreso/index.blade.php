@extends('layouts.principal')
@section('contenido')

<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Listado de Ingreso
                    <a href="adquisicion/create"><button type="button" class="btn btn-success">Nuevo</button></a>
                </h1>
            </div>
        </div>
    </div>
</div>
<!-- /# row -->
<section id="main-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                      @include('registro.ingreso.search')
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                  <th>Nro</th>
                                  <th>Fecha</th>
                                  <th>Proveedor</th>
                                  <th>Almacen</th>
                                  <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($ingreso as $in)
                              <tr>
                                  <td>{{$in->NroAdquisicion}}</td>
                                  <td>{{$in->Fecha}} </td>
                                  <td>{{$in->Nombre}} </td>
                                  <td>{{$in->NroAlmacen}} </td>
                                  <td>
                                      <a href="{{URL::action('AdquisicionController@show',$in->NroAdquisicion)}}"><button class="btn btn-info" > Detalles </button></a>
                                      <a href="" data-target="#modal-delete-{{$in->NroAdquisicion}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
                                  </td>
                              </tr>
                              @include('registro.ingreso.modal')
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$ingreso->render()}}
            </div>
            <div>
            <a href="/adquisicion/reporteAdquisicion"> <button class="btn btn-primary">descargar PDF</button> </a>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->

</section>

@endsection
