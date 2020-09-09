<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Ubicacion</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="page-wrap">
	<h1>Reporte Ubicacion</h1>
	<p></p>
	<table>
		<tr>
			<th style="width: 70px">Id Ubicacion</th>
			<th>Edificio</th>
			<th>Ciudad</th>
			<th>Pais</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->CodUbicacion; ?></td>
			<td><?= $r->Edificio; ?></td>
			<td><?= $r->Ciudad; ?></td>
			<td><?= $r->Pais; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>
  </div>
</body>
</html>
