<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REPORTE DE RUBRO</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilospdf.css">
  </head>
<body>
  <header>
      <p class="mt-5">--------LISTADO DE RUBRO------</p>
  </header>
    <div class="container align-items-center">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col" class="text-center" style="width: 70px">Id Rubro</th>
                <th scope="col" class="text-center">Descripcion</th>
                <th scope="col" class="text-center">Vida Util</th>
                <th scope="col" class="text-center">Coeficiente</th>
              </tr>
            </thead>
            <tbody>
				<?php foreach ($data as $r) { ?>
					<tr>
                        <td class="text-center"><?= $r->CodRubro; ?></td>
                        <td class="text-center"><?= $r->Descripcion; ?></td>
                        <td class="text-center"><?= $r->vidautil; ?> años</td>
                        <td class="text-center"><?= $r->coeficiente; ?> %</td>
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


