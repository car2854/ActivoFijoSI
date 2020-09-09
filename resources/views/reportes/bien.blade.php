<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Bien</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="page-wrap">
	<h1>Reporte Bien</h1>
	<p></p>
	<table>
		<tr>
			<th style="width: 120px">Codigo</th>
			<th>Nombre</th>
			<th>Fecha Adquisicion</th>
			<th>Valor Compra</th>
			<th>Departamento</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->CodBien; ?></td>
			<td><?= $r->Nombre; ?></td>
			<td><?= $r->FechaAdquisicion; ?></td>
			<td><?= $r->ValorCompra; ?></td>
			<td><?= $r->Descripcion; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha: <?=  $date; ?></h4></p>
  </div>
</body>
</html>
