<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Custodio</title>

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

	<h1>Reporte Custodio</h1>

	<table>
		<tr>
			<th style="width: 70px">Codigo</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Telefono</th>
			<th>Departamento</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->CodCustodio; ?></td>
			<td><?= $r->NombreCustodio; ?></td>
			<td><?= $r->ApellidoCustodio; ?></td>
			<td><?= $r->TelefonoCustodio; ?></td>
			<td><?= $r->NombreDepartamento; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha: <?=  $date; ?></h4></p>

</body>
</html>
