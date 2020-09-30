<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REPORTE DE DEPRECIACION</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilospdf.css">
  </head>
<body>
  <header>
      <p class="mt-5">--------LISTADO DE DEPRECIACION------</p>
  </header>
    <div class="container align-items-center">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col" class="text-center">Codigo Bien</th>
                <th scope="col" class="text-center">Nombre</th>
                <th scope="col" class="text-center">Departamento</th>
                <th scope="col" class="text-center">Depreciacion</th>
                <th scope="col" class="text-center">Valor Compra</th>
              </tr>
            </thead>
            <tbody>
				<?php foreach ($data as $r) { ?>
					<tr>
                        <td class="text-center">{{ $r['CodBien'] }}</td>
                        <td class="text-center">{{ $r['Nombre'] }}</td>
                        <td class="text-center">{{ $r['Descripcion'] }}</td>
                        <td class="text-center">{{ $r['depreciacion'] }}</td>
                        <td class="text-center">{{ $r['ValorCompra'] }}</td>
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




