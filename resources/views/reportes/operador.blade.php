<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Operador</title>

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

	<h1>Reporte Operador</h1>

	<table>
		<tr>
			<th style="width: 70px">Codigo</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Telefono</th>
			<th>Gmail</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->CodOperador; ?></td>
			<td><?= $r->Nombre; ?></td>
			<td><?= $r->Apellido; ?></td>
			<td><?= $r->Telefono; ?></td>
			<td><?= $r->Gmail; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha: <?=  $date; ?></h4></p>

</body>
</html>
