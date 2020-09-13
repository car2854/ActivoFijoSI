<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REPORTE DE PROVEEDOR</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilospdf.css">
  </head>
<body>
  <header>
      <p class="mt-5">--------LISTADO DE PROVEEDOR------</p>
  </header>
    <div class="container align-items-center">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col" class="text-center" style="width: 70px">Codigo</th>
                <th scope="col" class="text-center">Nombre</th>
                <th scope="col" class="text-center">Apellido</th>
                <th scope="col" class="text-center">Telefono</th>
                <th scope="col" class="text-center">Direccion</th>
              </tr>
            </thead>
            <tbody>
				<?php foreach ($data as $r) { ?>
					<tr>
                        <td class="text-center"><?= $r->CodProveedor; ?></td>
                        <td class="text-center"><?= $r->Nombre; ?></td>
                        <td class="text-center"><?= $r->Apellido; ?></td>
                        <td class="text-center"><?= $r->Telefono; ?></td>
                        <td class="text-center"><?= $r->Direccion; ?></td>
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



