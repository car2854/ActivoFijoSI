<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Bitacora</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="page-wrap">
	<h1>Reporte Bitacora</h1>
	<p></p>
	<table>
		<tr>
			<th>Usuario</th>
			<th>Gmail</th>
			<th>Accion Realiazda</th>
			<th>Fecha Hora de accion</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->name; ?></td>
			<td><?= $r->email; ?></td>
			<td><?= $r->accion; ?></td>
			<td><?= $r->fechaAccion; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>
  </div>
</body>
</html>
