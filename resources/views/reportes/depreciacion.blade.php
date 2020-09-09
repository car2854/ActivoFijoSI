<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Depreciacion</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="page-wrap">
	<h1>Reporte Depreciacion</h1>
	<p></p>
	<table>
		<tr>
			<th style="width: 120px">Codigo Bien</th>

			<th>Valor Compra</th>
			<th>Vida Util</th>
			<th>Fecha Adquisicion</th>
			<th>Depreciacion</th>
			<th>Nombre Custodio</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td>{{$r['CodBien']}}</td>

			<td>{{$r['ValorCompra']}}</td>
			<td>{{$r['vidautil']}}</td>
			<td>{{$r['FechaAdquisicion']}}</td>
			<td>{{$r['depreciacion']}}</td>
			<td>{{$r['nombreCustodio']}}</td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>
  </div>
</body>
</html>
