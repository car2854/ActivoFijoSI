<table id="example1" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>Usuario</th>
    <th>Email</th>
    <th>Accion Realizada</th>
    <th>Fecha y Hora de la accion</th>
    <th>Rol</th>
  </tr>
  </thead>
  @foreach($lista as $lis)
  <tbody>
  <tr>
    <td>{{$lis->name}}</td>
    <td>{{$lis->email}}</td>
    <td>{{$lis->accion}}</td>
    <td>{{$lis->fechaAccion}}</td>
    <td>{{$lis->rol}}</td>
  </tr>
  </tbody>
  @endforeach
</table>
