<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Usuario</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
	<div id="page-wrap">
	<h1>Reporte Usuario</h1>
	<p></p>
	<table>
		<tr>
			<th>Nombre</th>
			<th>Gmail</th>
			<th>Rol</th>
			<th>Fecha de creacion</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->name; ?></td>
			<td><?= $r->email; ?></td>
			<td><?= $r->rol; ?></td>
			<td><?= $r->created_at; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>
  </div>
</body>
</html>
