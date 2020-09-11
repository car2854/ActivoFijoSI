<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Almacen</title>

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

	<h1>Reporte Almacen</h1>

	<table>
		<tr>
			<th style="width: 100px">Nro Almacen</th>
			<th>Direccion</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->NroAlmacen; ?></td>
			<td><?= $r->Direccion; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>

</body>
</html>
