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
          <th>Custodio</th>
          <th>Operador</th>
          <th>Fecha Baja</th>
          <th>Categoria</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
		<td>{{$r->CodigoBien}}</td>
          <td>{{$r->NombreBien}}</td>
          <td>{{$r->NombreCustodio}}</td>
          <td>{{$r->NombreOperador}}</td>
          <td>{{$r->FechaHora}}</td>
          <td>{{$r->NombreCategoria}}</td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>
  </div>
</body>
</html>
