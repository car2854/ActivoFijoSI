<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Adquisicion</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="page-wrap">
	<h1>Reporte Adquisicion</h1>
	<p></p>
	<table>
		<tr>
			<th style="width: 70px">Nro</th>
			<th>Fecha</th>
			<th>Proveedor</th>
			<th>Almacen</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->NroAdquisicion; ?></td>
			<td><?= $r->Fecha; ?></td>
			<td><?= $r->Nombre; ?></td>
			<td><?= $r->NroAlmacen; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>
  </div>
</body>
</html>
