<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Rubro</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="page-wrap">
	<h1>Reporte Rubro</h1>
	<p></p>
	<table>
		<tr>
			<th style="width: 70px">Id Rubro</th>
			<th>Descripcion</th>
			<th>Vida Util</th>
			<th>Coeficiente</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->CodRubro; ?></td>
			<td><?= $r->Descripcion; ?></td>
			<td><?= $r->vidautil; ?> años</td>
			<td><?= $r->coeficiente; ?> %</td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>
  </div>
</body>
</html>
