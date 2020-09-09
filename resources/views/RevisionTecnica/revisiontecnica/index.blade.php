@extends ('layouts.principal')
@section ('contenido')

<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Listado Revision Tecnica
                <a href="revisiontecnica/create"><button class="btn btn-primary">Nuevo</button></a></h1>
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
                      @include('RevisionTecnica.revisiontecnica.Search')
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                  <h4>Bien en espera</h4>

                                      <th>#</th>
                                      <th>Cod. Bien</th>
                                      <th>Nombre Bien</th>
                                      <th>Custodio</th>
                                      <th>Operador</th>
                                      <th>Fecha</th>
                                      <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $id = 0;
                              ?>
                              @foreach($revision as $r)
                                  <tr>
                                    <td>{{ $id = $id + 1 }}</td>
                                    <td>{{ $r->CodBien }}</td>
                                    <td>{{ $r->NombreBien }}</td>
                                    <td>{{ $r->NombreCustodio }} {{ $r->ApellidoCustodio }}</td>
                                    <td>{{ $r->NombreOperador }} {{ $r->ApellidoOperador }}</td>
                                    <td>{{ $r->FechaHora }}</td>
                                    <td>
                                      <a href="Baja/create/{{$r->NroRevision}}"><button class="btn btn-danger">Baja</button></a>
                                      <a href="Mantenimiento/create/{{$r->NroRevision}}"><button class="btn btn-info">Mantenimiento</button></a>
                                      <a href="Revaluo/create/{{$r->NroRevision}}"><button class="btn btn-success">Revaluo</button></a>
                                    </td>
                                  </tr>
                              @endforeach
                            </tbody>
                        </table>
                        <br>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                  <h4>Bien en mantenimiento</h4>
                                    <th>#</th>
                                    <th>Cod. Bien</th>
                                    <th>Nombre Bien</th>
                                    <th>Custodio</th>
                                    <th>Operador</th>
                                    <th>Fecha</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $id = 0;
                              ?>
                              @foreach($mantenimiento as $m)
                              <tbody>
                                  <tr>
                                    <td>{{ $id = $id + 1 }}</td>
                                    <td>{{ $m->CodBien }}</td>
                                    <td>{{ $m->NombreBien }}</td>
                                    <td>{{ $m->NombreCustodio }} {{ $m->ApellidoCustodio }}</td>
                                    <td>{{ $m->NombreOperador }} {{ $m->ApellidoOperador }}</td>
                                    <td>{{ $m->FechaHora }}</td>
                                    <td>
                                      <a href="Revaluo/create/{{$m->NroRevision}}"><button class="btn btn-success">Revaluo</button></a>
                                    </td>
                                  </tr>
                              </tbody>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->

</section>


@endsection
