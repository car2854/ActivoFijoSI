<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Mantenimiento</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="page-wrap">
	<h1>Reporte Mantenimiento</h1>
	<p></p>
	<table>
		<tr>
			<th style="width: 85px">Codigo Bien</th>
			<th style="width: 60px">Nombre Bien</th>
			<th style="width: 60px">Nombre Custodio</th>
			<th style="width: 20px">Nombre Operador</th>
			<th>Fecha Inicio</th>
			<th>Fecha Final</th>
			<th>Fecha Problema</th>
			<th>Fecha Solucion</th>
			<th>Fecha Costo</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->CodBien; ?></td>
			<td><?= $r->NombreBien; ?></td>
			<td><?= $r->NombreCustodio; ?></td>
			<td><?= $r->NombreOperador; ?></td>
			<td><?= $r->FechaInicio; ?></td>
			<td><?= $r->FechaFinalizo; ?></td>
			<td><?= $r->Problema; ?></td>
			<td><?= $r->Solucion; ?></td>
			<td><?= $r->Costo; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>
  </div>
</body>
</html>
