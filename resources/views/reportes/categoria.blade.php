<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Categoria</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="page-wrap">
	<h1>Reporte Categoria</h1>
	<p></p>
	<table>
		<tr>
			<th style="width: 70px">Id Categoria</th>
			<th>Nombre</th>
			<th>Rubro</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->CodCategoria; ?></td>
			<td><?= $r->Nombre; ?></td>
			<td><?= $r->rubro; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>
  </div>
</body>
</html>
