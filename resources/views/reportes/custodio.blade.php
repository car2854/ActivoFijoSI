<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Custodio</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="page-wrap">
	<h1>Reporte Custodio</h1>
	<p></p>
	<table>
		<tr>
			<th style="width: 70px">Codigo</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Telefono</th>
			<th>Departamento</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->CodCustodio; ?></td>
			<td><?= $r->NombreCustodio; ?></td>
			<td><?= $r->ApellidoCustodio; ?></td>
			<td><?= $r->TelefonoCustodio; ?></td>
			<td><?= $r->NombreDepartamento; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha: <?=  $date; ?></h4></p>
  </div>
</body>
</html>
