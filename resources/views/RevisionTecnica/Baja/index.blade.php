@extends ('layouts.principal')
@section ('contenido')

<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Listado Baja</h1>
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
                      @include('RevisionTecnica.Baja.Search')
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Cod. Bien</th>
                                  <th>Nombre Bien</th>
                                  <th>Custodio</th>
                                  <th>Operador</th>
                                  <th>Fecha</th>
                                  <th>Descripcion</th>
                                  <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $id = 0;
                              ?>
                              @foreach($baja as $b)

                                  <tr>
                                    <td>{{ $id = $id + 1 }}</td>
                                    <td>{{ $b->CodBien }}</td>
                                    <td>{{ $b->NombreBien }}</td>
                                    <td>{{ $b->NombreCustodio }}</td>
                                    <td>{{ $b->NombreOperador  }}</td>
                                    <td>{{ $b->FechaHora }}</td>
                                    <td>{{ $b->Descripcion }}</td>
                                    <td>
                                      <a><button class="btn btn-info">Editar</button></a>
                                    </td>
                                  </tr>

                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div>
            <a href="/RevisionTecnica/reporteBaja"> <button class="btn btn-primary">descargar PDF</button> </a>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->

</section>


@endsection
