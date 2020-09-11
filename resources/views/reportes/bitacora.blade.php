<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Bitacora</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<style>
        table{
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th{
            border: 1px solid #dddddd;
            text-align: left;
            padding: 5px 10px;
        }
        tr:nth-child(even){
            background-color: #dddddd;
        }
    </style>
</head>
<body>

	<h1>Reporte Bitacora</h1>

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

</body>
</html>
