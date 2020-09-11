<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Rubro</title>

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

	<h1>Reporte Rubro</h1>

	<table>
		<tr>
			<th style="width: 70px">Id Rubro</th>
			<th>Descripcion</th>
			<th>Vida Util</th>
			<th>Coeficiente</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->CodRubro; ?></td>
			<td><?= $r->Descripcion; ?></td>
			<td><?= $r->vidautil; ?> años</td>
			<td><?= $r->coeficiente; ?> %</td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>
</body>
</html>
