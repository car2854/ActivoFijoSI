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


