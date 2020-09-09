@extends('layouts.principal')
@section('contenido')

<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Listado de Categoria
                    <a href="categoria/create"><button type="button" class="btn btn-success">Nuevo</button></a>
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
                      @include('almacen.categoria.search')
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Nombre</th>
                                  <th>Rubro</th>
                                  <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($categoria as $ca)
                              <tr>
                                  <td>{{$ca->CodCategoria}}</td>
                                  <td>{{$ca->Nombre}} </td>
                                  <td>{{$ca->rubro}} </td>

                                  <td>
                                      <a href="{{URL::action('CategoriaController@edit',$ca->CodCategoria)}}"><button class="btn btn-info" > Editar</button></a>
                                      <a href="" data-target="#modal-delete-{{$ca->CodCategoria}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
                                  </td>
                              </tr>
                              @include('almacen.categoria.modal')
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$categoria->render()}}
            </div>
            <div>
            <a href="/almacen/reporteCategoria"> <button class="btn btn-primary">descargar PDF</button> </a>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->

</section>

@endsection
