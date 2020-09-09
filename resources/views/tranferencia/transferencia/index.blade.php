@extends('layouts.principal')
@section('contenido')

<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Listado de Transferencia
                    <a href="transferencia/create"><button type="button" class="btn btn-success">Nuevo</button></a>
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
                      @include('tranferencia.transferencia.search')
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                  <th>NroTransferencia</th>
                                  <th>Fecha</th>
                                  <th>Custodio Origen</th>
                                  <th>Responsable</th>
                                  <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($tranferencia as $tra)
                              <tr>
                                  <td>{{$tra->NroTranferencia}}</td>
                                  <td>{{$tra->FechaTranferencia}} </td>
                                  <td>{{$tra->nombrec1}}</td>
                                  <td>{{$tra->nombrer}}</td>

                                  <td>
                                      <a href="{{URL::action('CategoriaController@edit',$tra->NroTranferencia)}}"><button class="btn btn-info" > Editar</button></a>
                                      <a href="" data-target="#modal-delete-{{$tra->NroTranferencia}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
                                  </td>
                              </tr>
                              @include('tranferencia.transferencia.modal')
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$tranferencia->render()}}
            </div>
            <div>
              <a href="/tranferencia/reporteTransferencia"> <button class="btn btn-primary">descargar PDF</button> </a>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->

</section>


@endsection
