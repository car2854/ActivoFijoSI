<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Adquisicion</title>
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
    <h1>Reporte Adquisicion</h1>

    <table>

		<tr>
			<th style="width: 70px">Nro</th>
			<th>Fecha</th>
			<th>Proveedor</th>
			<th>Almacen</th>
		</tr>
        <?php foreach ($data as $r) { ?>
            <tr>
                <td><?= $r->NroAdquisicion; ?></td>
                <td><?= $r->Fecha; ?></td>
                <td><?= $r->Nombre; ?></td>
                <td><?= $r->NroAlmacen; ?></td>
            </tr>
        <?php  } ?>

    </table>
    <p><h4>Fecha <?=  $date; ?></h4></p>
</body>
</html>

