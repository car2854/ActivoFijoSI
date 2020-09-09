@extends('layouts.principal')
@section ('contenido')

<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Listado Almacen<a href="Almacen/create"><button class="btn btn-success">Nuevo</button></a>
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
                      @include('Almacenamiento.Almacen.Search')
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                  <th>NroAlmacen</th>
                                  <th>Direccion</th>
                                  <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($almacen as $alm)
                                  <tr>
                                    <td>{{ $alm->NroAlmacen }}</td>
                                    <td>{{ $alm->Direccion }}</td>
                                    <td>
                                      <a href="{{URL::action('AlmacenController@edit',$alm->NroAlmacen)}}"><button class="btn btn-info">Editar</button></a>
                                      <a href="" data-target="#modal-delete-{{$alm->NroAlmacen}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                                    </td>
                                  </tr>
                                  @include('Almacenamiento.Almacen.modal')
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$almacen->render()}}
            </div>
            <div>
            <a href="/Almacenamiento/reporteAlmacen"> <button class="btn btn-primary">descargar PDF</button> </a>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
</section>


@endsection
