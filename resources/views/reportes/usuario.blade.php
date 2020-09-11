<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Usuario</title>
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
    <h1>Reporte Usuario</h1>

    <table>

        <tr>
			<th>Nombre</th>
			<th>Gmail</th>
			<th>Rol</th>
			<th>Fecha de creacion</th>
		</tr>
        <?php foreach ($data as $r) { ?>
            <tr>
                <td><?= $r->name; ?></td>
                <td><?= $r->email; ?></td>
                <td><?= $r->rol; ?></td>
                <td><?= $r->created_at; ?></td>
            </tr>
        <?php  } ?>

    </table>
    <p><h4>Fecha <?=  $date; ?></h4></p>
</body>
</html>

