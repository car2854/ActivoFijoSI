<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Almacen</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="page-wrap">
	<h1>Reporte Almacen</h1>
	<p></p>
	<table>
		<tr>
			<th>Usuario</th>
          <th>Email</th>
          <th>Accion Realizada</th>
          <th>Fecha y Hora de la accion</th>
          <th>Rol</th>
		</tr>
    <?php foreach ($data as $lis) { ?>
		<tr>
			<td>{{$lis->name}}</td>
          <td>{{$lis->email}}</td>
          <td>{{$lis->accion}}</td>
          <td>{{$lis->fechaAccion}}</td>
          <td>{{$lis->rol}}</td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>
  </div>
</body>
</html>
