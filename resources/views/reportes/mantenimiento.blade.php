<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REPORTE DE MANTENIMIENTO</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilospdf.css">
  </head>
<body>
  <header>
      <p class="mt-5">--------LISTADO DE MANTENIMIENTO------</p>
  </header>
    <div class="container align-items-center">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col" class="text-center" style="width: 85px">Codigo Bien</th>
                <th scope="col" class="text-center" style="width: 60px">Nombre Bien</th>
                <th scope="col" class="text-center" style="width: 60px">Nombre Custodio</th>
                <th scope="col" class="text-center" style="width: 20px">Nombre Operador</th>
                <th scope="col" class="text-center">Fecha Inicio</th>
                <th scope="col" class="text-center">Fecha Final</th>
                <th scope="col" class="text-center">Fecha Problema</th>
                <th scope="col" class="text-center">Fecha Solucion</th>
                <th scope="col" class="text-center">Fecha Costo</th>
              </tr>
            </thead>
            <tbody>
				<?php foreach ($data as $r) { ?>
					<tr>
                        <td class="text-center"><?= $r->CodBien; ?></td>
                        <td class="text-center"><?= $r->NombreBien; ?></td>
                        <td class="text-center"><?= $r->NombreCustodio; ?></td>
                        <td class="text-center"><?= $r->NombreOperador; ?></td>
                        <td class="text-center"><?= $r->FechaInicio; ?></td>
                        <td class="text-center"><?= $r->FechaFinalizo; ?></td>
                        <td class="text-center"><?= $r->Problema; ?></td>
                        <td class="text-center"><?= $r->Solucion; ?></td>
                        <td class="text-center"><?= $r->Costo; ?></td>
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


