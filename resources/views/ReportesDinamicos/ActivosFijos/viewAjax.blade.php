<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Usuario</title>
    <style>
        table{
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th{
            border: 1px solid #dddddd;
            text-align: left;
            padding: 5px 10px;
        }
        tr:nth-child(even){
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <h1>Reporte Usuario</h1>

    <table>

        <tr>
            <th>Codigo Bien</th>
            <th>Nombre Bien</th>
            <th>Valor Compra</th>
            <th>Fecha Adquisicion</th>
            <th>Departamentos</th>
            <th>Categoria</th>
		</tr>
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
    <p><h4>Fecha <?=  $date; ?></h4></p>
</body>
</html>


