<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Almacen</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="page-wrap">
	<h1>Reporte Almacen</h1>
	<p></p>
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
  
  </div>
</body>
</html>

