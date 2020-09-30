@extends ('layouts.principal')
@section ('contenido')

<div class="content">
    <div class="card-body">
        <h4 class="box-title">Listado Revaluo</h4>
        @include('RevisionTecnica.Mantenimiento.Search')
    </div>
    <div class="card-body--">
        <div class="table-stats order-table ov-h">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <tr>
                      <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Cod. Bien</th>
                      <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Nombre Bien</th>
                      <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Custodio</th>
                      <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Operador</th>
                      <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Estado</th>
                      <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">FechaHora</th>
                      <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Monto</th>
                      <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Descripcion</th>
                    </tr>
                </thead>
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
            </table>
        </div> <!-- /.table-stats -->
        {{$revaluo->render()}}
    </div>
  </div>

@endsection
