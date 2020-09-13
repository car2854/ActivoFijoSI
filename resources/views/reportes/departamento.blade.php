<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REPORTE DE CUSTODIO</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilospdf.css">
  </head>
<body>
  <header>
      <p class="mt-5">--------LISTADO DE CUSTODIO------</p>
  </header>
    <div class="container align-items-center">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col" class="text-center">Codigo</th>
                <th scope="col" class="text-center">Nombre</th>
                <th scope="col" class="text-center">Apellido</th>
                <th scope="col" class="text-center">Telefono</th>
                <th scope="col" class="text-center">Departamento</th>
              </tr>
            </thead>
            <tbody>
				<?php foreach ($data as $r) { ?>
					<tr>
                        <td class="text-center"><?= $r->CodCustodio; ?></td>
                        <td class="text-center"><?= $r->NombreCustodio; ?></td>
                        <td class="text-center"><?= $r->ApellidoCustodio; ?></td>
                        <td class="text-center"><?= $r->TelefonoCustodio; ?></td>
                        <td class="text-center"><?= $r->NombreDepartamento; ?></td>
					</tr>
				<?php  } ?>
            </tbody>
          </table>
    </div>
    <footer>
        <p class="mt-3"> FECHA <?=  $date; ?></p>
    </footer>
</body>
</html>





<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Departamento</title>

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

	<h1>Reporte Departamento</h1>

	<table>
		<tr>
			<th style="width: 70px">Id Departamento</th>
			<th>Descripcion</th>
			<th>Edificio</th>
			<th>Ciudad</th>
			<th>Pais</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->CodDepartamento; ?></td>
			<td><?= $r->Descripcion; ?></td>
			<td><?= $r->edificio; ?></td>
			<td><?= $r->ciudad; ?></td>
			<td><?= $r->pais; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>

</body>
</html>
