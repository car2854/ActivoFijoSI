
<table id="example1" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>Codigo Bien</th>
    <th>Nombre Bien</th>
    <th>Valor Compra</th>
    <th>Fecha Adquisicion</th>
    <th>Departamentos</th>
    <th>Categoria</th>
  </tr>
  </thead>
  @foreach($ListaBien as $lista)
  <tbody>

  <tr>

    <td>{{$lista->CodBien}}</td>
    <td>{{$lista->NombreBien}}</td>
    <td>{{$lista->ValorCompra}}</td>
    <td>{{$lista->FechaAdquisicion}}</td>
    <td>{{$lista->Descripcion}}</td>
    <td>{{$lista->NombreCategoria}}</td>

  </tr>
  </tbody>
  @endforeach

</table>
