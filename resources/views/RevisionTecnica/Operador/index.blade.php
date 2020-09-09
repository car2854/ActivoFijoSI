@extends ('layouts.principal')
@section ('contenido')

<div class="content">
  <div class="card-body">
      <h4 class="box-title">Listado Operador</h4>
      @include('RevisionTecnica.Operador.Search')
  </div>
  <div class="card-body--">
      <div class="table-stats order-table ov-h">
          <table class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                  <tr>
                    <th>#</th>
                    <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Nombre</th>
                    <th class="col-lg-3 col-md-3 col-sm-3 col-xs-3">Apellido</th>
                    <th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Telefono</th>
                    <th class="col-lg-3 col-md-3 col-sm-3 col-xs-3">Gmail</th>
                    <th>Opciones</th>
                  </tr>
              </thead>
              <?php
                $id = 0;
              ?>
              @foreach($operador as $opr)
              <tbody>
                  <tr>
                    <td>{{ $id = $id + 1 }}</td>
                    <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2">{{ $opr->Nombre }}</td>
                    <td>{{ $opr->Apellido }}</td>
                    <td>{{ $opr->Telefono }}</td>
                    <td>{{ $opr->Gmail }}</td>
                    <td class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                      <a href="{{URL::action('OperadorController@edit',$opr->CodOperador)}}"><button class="btn btn-info">Editar</button></a>
                      <a href="" data-target="#modal-delete-{{$opr->CodOperador}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    </td>
                  </tr>
                  @include('RevisionTecnica.Operador.modal')
              </tbody>
              @endforeach
          </table>
      </div> <!-- /.table-stats -->
      {{$operador->render()}}
  </div>
  <a href="Operador/create"><button class="btn btn-primary">Nuevo</button></a>
</div>



@endsection
