@extends('layouts.principal')
@section('contenido')

<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Mis Ubicaciones
                    <a href="ubicacion/create"><button type="button" class="btn btn-success">Nuevo</button></a>
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
                      @include('ubicacion.ubicacion.search')
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Edificio</th>
                                  <th>Ciudad</th>
                                  <th>Pais</th>
                                  <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($ubicacion as $ubi)
                              <tr>
                                  <td>{{$ubi->CodUbicacion}}</td>
                                  <td>{{$ubi->Edificio}} </td>
                                  <td>{{$ubi->Ciudad}} </td>
                                  <td>{{$ubi->Pais}} </td>
                                  <td>
                                      <a href="{{URL::action('UbicacionController@edit',$ubi->CodUbicacion)}}"><button class="btn btn-info" > Editar</button></a>
                                      <a href="" data-target="#modal-delete-{{$ubi->CodUbicacion}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
                                  </td>
                              </tr>
                              @include('ubicacion.ubicacion.modal')
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$ubicacion->render()}}
            </div>
            <div>
            <a href="/ubicacion/reporteUbicacion"> <button class="btn btn-primary">descargar PDF</button> </a>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->

</section>

@endsection
