<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Responsable</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="page-wrap">
	<h1>Reporte Responsable</h1>
	<p></p>
	<table>
		<tr>
			<th style="width: 70px">Codigo</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Telefono</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->CodResponsable; ?></td>
			<td><?= $r->Nombre; ?></td>
			<td><?= $r->Apellido; ?></td>
			<td><?= $r->Telefono; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha: <?=  $date; ?></h4></p>
  </div>
</body>
</html>
