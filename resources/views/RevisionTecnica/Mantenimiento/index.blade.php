@extends ('layouts.principal')
@section ('contenido')

  <div class="row">
      <div class="col-lg-8 p-r-0 title-margin-right">
          <div class="page-header">
              <div class="page-title">
                  <h1>Listado Mantenimiento</h1>
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
                        @include('RevisionTecnica.Mantenimiento.Search')
                          <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                              <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Cod. Bien</th>
                                    <th>Nombre Bien</th>
                                    <th>Custodio</th>
                                    <th>Operador</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha fin</th>
                                    <th>Problema</th>
                                    <th>Solucion</th>
                                    <th>Costo</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $id = 0;
                                ?>
                                @foreach($mantenimiento as $m)

                                    <tr>
                                      <td>{{ $id = $id + 1 }}</td>
                                      <td>{{ $m->CodBien }}</td>
                                      <td>{{ $m->NombreBien }}</td>
                                      <td>{{ $m->NombreCustodio }}</td>
                                      <td>{{ $m->NombreOperador }}</td>
                                      <td>{{ $m->FechaInicio }}</td>
                                      <td>{{ $m->FechaFinalizo }}</td>
                                      <td>{{ $m->Problema }}</td>
                                      <td>{{ $m->Solucion }}</td>
                                      <td>{{ $m->Costo }}</td>
                                    </tr>

                                @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <div>
              <a href="/RevisionTecnica/reporteMantenimiento"> <button class="btn btn-primary">descargar PDF</button> </a>
              </div>
              <!-- /# card -->
          </div>
          <!-- /# column -->
      </div>
      <!-- /# row -->

  </section>


@endsection
