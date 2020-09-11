<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Almacen</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
	<h1>Reporte Almacen</h1>
	<table>
		<tr>
			<th>Codigo Bien</th>
          <th>Nombre Bien</th>
          <th>Valor Compra</th>
          <th>Fecha Adquisicion</th>
          <th>Departamentos</th>
          <th>Categoria</th>
		</tr>

            <?php foreach ($data as $r) { ?>
		<tr>

			<td>{{$r->CodBien}}</td>
          <td>{{$r->NombreBien}}</td>
          <td>{{$r->ValorCompra}}</td>
          <td>{{$r->FechaAdquisicion}}</td>
          <td>{{$r->Descripcion}}</td>
          <td>{{$r->NombreCategoria}}</td>
		</tr>
            <?php  } ?>
	</table>

</body>
</html>

