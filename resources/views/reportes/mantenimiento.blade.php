<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Mantenimiento</title>

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

	<h1>Reporte Mantenimiento</h1>

	<table>
		<tr>
			<th style="width: 85px">Codigo Bien</th>
			<th style="width: 60px">Nombre Bien</th>
			<th style="width: 60px">Nombre Custodio</th>
			<th style="width: 20px">Nombre Operador</th>
			<th>Fecha Inicio</th>
			<th>Fecha Final</th>
			<th>Fecha Problema</th>
			<th>Fecha Solucion</th>
			<th>Fecha Costo</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->CodBien; ?></td>
			<td><?= $r->NombreBien; ?></td>
			<td><?= $r->NombreCustodio; ?></td>
			<td><?= $r->NombreOperador; ?></td>
			<td><?= $r->FechaInicio; ?></td>
			<td><?= $r->FechaFinalizo; ?></td>
			<td><?= $r->Problema; ?></td>
			<td><?= $r->Solucion; ?></td>
			<td><?= $r->Costo; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>

</body>
</html>
