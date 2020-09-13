<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REPORTE DE TRANFERENCIA</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilospdf.css">
  </head>
<body>
  <header>
      <p class="mt-5">--------LISTADO DE TRANFERENCIA------</p>
  </header>
    <div class="container align-items-center">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col" class="text-center" style="width: 70px">Numero Tranferencia</th>
                <th scope="col" class="text-center">Fecha</th>
                <th scope="col" class="text-center">Custodio Origen</th>
                <th scope="col" class="text-center">Responsable</th>
              </tr>
            </thead>
            <tbody>
				<?php foreach ($data as $r) { ?>
					<tr>
                        <td class="text-center"><?= $r->NroTranferencia; ?></td>
                        <td class="text-center"><?= $r->FechaTranferencia; ?></td>
                        <td class="text-center"><?= $r->nombrec1; ?></td>
                        <td class="text-center"><?= $r->nombrer; ?></td>
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



