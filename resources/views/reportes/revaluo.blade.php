<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REPORTE DE REVALUO</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilospdf.css">
  </head>
<body>
  <header>
      <p class="mt-5">--------LISTADO DE REVALUO------</p>
  </header>
    <div class="container align-items-center">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col" class="text-center" style="width: 70px">Codigo Bien</th>
                <th scope="col" class="text-center">Nombre</th>
                <th scope="col" class="text-center">Fecha Hora</th>
                <th scope="col" class="text-center">Monto</th>
                <th scope="col" class="text-center">Descripcion</th>
              </tr>
            </thead>
            <tbody>
				<?php foreach ($data as $r) { ?>
					<tr>
                        <td class="text-center"><?= $r->CodBien; ?></td>
                        <td class="text-center"><?= $r->NombreBien; ?></td>
                        <td class="text-center"><?= $r->FechaHora; ?></td>
                        <td class="text-center"><?= $r->Monto; ?></td>
                        <td class="text-center"><?= $r->Descripcion; ?></td>
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



