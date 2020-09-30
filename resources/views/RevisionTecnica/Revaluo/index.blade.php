@extends ('layouts.principal')
@section ('contenido')


<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Listado Revaluo</h1>
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
                                  <th>Cod. Bien</th>
                                  <th>Nombre Bien</th>
                                  <th>Custodio</th>
                                  <th>Operador</th>
                                  <th>Estado</th>
                                  <th>FechaHora</th>
                                  <th>Monto</th>
                                  <th>Descripcion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($revaluo as $r)
                                <tbody>
                                    <tr>
                                        <td>{{ $r->CodBien }}</td>
                                        <td>{{ $r->NombreBien }}</td>
                                        <td>{{ $r->NombreCustodio }}</td>
                                        <td>{{ $r->NombreOperador }}</td>
                                        <td>{{ $r->Estado }}</td>
                                        <td>{{ $r->FechaHora }}</td>
                                        <td>{{ $r->Monto }}</td>
                                        <td>{{ $r->Descripcion }}</td>
                                    </tr>
                                </tbody>
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
