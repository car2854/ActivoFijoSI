@extends('layouts.principal')
@section('contenido')

<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Listado de Rubro
                    <a href="rubro/create"><button type="button" class="btn btn-success">Nuevo</button></a>
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
                      @include('almacen.rubro.search')
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Descripcion</th>
                                  <th>Vida util</th>
                                  <th>Coeficiente</th>
                                  <th>Depreciacion</th>
                                  <th>Actualizacion</th>
                                  <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($rubro as $ru)
                              <tr>
                                  <td>{{$ru->CodRubro}}</td>
                                  <td>{{$ru->Descripcion}} </td>
                                  <td>{{$ru->vidautil}} años </td>
                                  <td>{{$ru->coeficiente}} %</td>
                                  @if ($ru->deprecia == 1)
                                  <td> V </td>
                                  @else
                                  <td> F </td>
                                  @endif
                                  @if ($ru->actualiza)
                                  <td> V </td>
                                  @else
                                  <td> F </td>
                                  @endif

                                  <td>
                                      <a href="{{URL::action('RubroController@edit',$ru->CodRubro)}}"><button class="btn btn-info" > Editar</button></a>
                                      <a href="" data-target="#modal-delete-{{$ru->CodRubro}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
                                  </td>
                              </tr>
                              @include('almacen.rubro.modal')
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$rubro->render()}}
            </div>
            <div>
            <a href="/almacen/reporteRubro"> <button class="btn btn-primary">descargar PDF</button> </a>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->

</section>

@endsection
