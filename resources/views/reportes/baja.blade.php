<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Baja</title>

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

	<h1>Reporte Baja</h1>

	<table>
		<tr>
			<th style="width: 100px">Codigo Bien</th>
			<th>Nombre</th>
			<th>Custodio</th>
			<th>Operador</th>
			<th>Fecha Hora</th>
			<th>Descripcion</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->CodBien; ?></td>
			<td><?= $r->NombreBien; ?></td>
			<td><?= $r->NombreCustodio; ?></td>
			<td><?= $r->NombreOperador; ?></td>
			<td><?= $r->FechaHora; ?></td>
			<td><?= $r->Descripcion; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>

</body>
</html>
