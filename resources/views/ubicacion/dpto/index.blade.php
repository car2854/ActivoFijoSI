@extends('layouts.principal')
@section('contenido')

<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Listado de Areas
                    <a href="departamento/create">
                    @can('create departamento')
                        <button type="button" class="btn btn-success">Nuevo</button>
                    @endcan
                    </a>
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
                      @include('ubicacion.dpto.search')
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Descripcion</th>
                                  <th>Edificio</th>
                                  <th>Ciudad</th>
                                  <th>Pais</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($departamento as $dpto)
                              <tr>
                                  <td>{{$dpto->CodDepartamento}}</td>
                                  <td>{{$dpto->Descripcion}} </td>
                                  <td>{{$dpto->edificio}} </td>
                                  <td>{{$dpto->ciudad}} </td>
                                  <td>{{$dpto->pais}} </td>

                                  <td>
                                      <a href="{{URL::action('DepartamentoController@edit',$dpto->CodDepartamento)}}">
                                      @can('update departamento')
                                          <button class="btn btn-info" > Editar</button>
                                      @endcan
                                      </a>
                                      <a href="" data-target="#modal-delete-{{$dpto->CodDepartamento}}" data-toggle="modal">
                                      @can('delete departamento')
                                      <button class="btn btn-danger"> Eliminar</button>
                                      @endcan
                                      </a>
                                  </td>
                              </tr>
                              @include('ubicacion.dpto.modal')
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$departamento->render()}}
            </div>
            <div>
            <a href="/ubicacion/reporteDepartamento"> <button class="btn btn-primary">descargar PDF</button> </a>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->

</section>

@endsection
