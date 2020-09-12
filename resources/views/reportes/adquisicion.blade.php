<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REPORTE DE CATEGORIAS</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilospdf.css">
  </head>
<body>
  <header>
      <p class="mt-5">--------LISTADO DE INGRESO------</p>
  </header>
    <div class="container align-items-center">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col" class="text-center">#NRO</th>
                <th scope="col" class="text-center">FECHA</th>
				<th scope="col" class="text-center">PROVEEDOR</th>
				<th scope="col" class="text-center">ALMACEN</th>
              </tr>
            </thead>
            <tbody>
				<?php foreach ($data as $r) { ?>
					<tr>
						<td class="text-center"><?= $r->NroAdquisicion; ?></td>
						<td class="text-center"><?= $r->Fecha; ?></td>
						<td class="text-center"><?= $r->Nombre; ?></td>
						<td class="text-center"><?= $r->NroAlmacen; ?></td>
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
