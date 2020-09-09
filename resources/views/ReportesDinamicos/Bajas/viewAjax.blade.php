<table id="example1" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>Codigo Bien</th>
    <th>Nombre Bien</th>
    <th>Custodio</th>
    <th>Operador</th>
    <th>Fecha Baja</th>
    <th>Categoria</th>
  </tr>
  </thead>
  @foreach($lista as $lis)
  <tbody>
  <tr>
    <td>{{$lis->CodigoBien}}</td>
    <td>{{$lis->NombreBien}}</td>
    <td>{{$lis->NombreCustodio}}</td>
    <td>{{$lis->NombreOperador}}</td>
    <td>{{$lis->FechaHora}}</td>
    <td>{{$lis->NombreCategoria}}</td>
  </tr>
  </tbody>
  @endforeach
</table>
