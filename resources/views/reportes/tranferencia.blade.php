<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Tranferencia</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="page-wrap">
	<h1>Reporte Tranferencia</h1>
	<p></p>
	<table>
		<tr>
			<th style="width: 70px">Numero Tranferencia</th>
			<th>Fecha</th>
			<th>Custodio Origen</th>
			<th>Responsable</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->NroTranferencia; ?></td>
			<td><?= $r->FechaTranferencia; ?></td>
			<td><?= $r->nombrec1; ?></td>
			<td><?= $r->nombrer; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>
  </div>
</body>
</html>
