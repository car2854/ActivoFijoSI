<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Baja</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="page-wrap">
	<h1>Reporte Baja</h1>
	<p></p>
	<table>
		<tr>
			<th style="width: 100px">Codigo Bien</th>
			<th>Nombre</th>
			<th>Custodio</th>
			<th>Operador</th>
			<th>Fecha Hora</th>
			<th>Descripcion</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->CodBien; ?></td>
			<td><?= $r->NombreBien; ?></td>
			<td><?= $r->NombreCustodio; ?></td>
			<td><?= $r->NombreOperador; ?></td>
			<td><?= $r->FechaHora; ?></td>
			<td><?= $r->Descripcion; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>
  </div>
</body>
</html>
