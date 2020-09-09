@extends ('layouts.principal')
@section ('contenido')

<div class="content">
  <div class="card-body">
      <h1 class="box-title">Listado Revaluo</h1>
      @include('RevisionTecnica.Mantenimiento.Search')
  </div>
  <div class="card-body--">
      <div class="table-stats order-table ov-h">
        <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <h4>Mantenimiento</h4>
                <tr>
                  <th>#</th>
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
            <?php
              $id = 0;
            ?>
            @foreach($revaluo as $r)
            <tbody>
                <tr>
                  <td>{{ $id = $id + 1 }}</td>
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
      </div>
  </div>




@endsection
