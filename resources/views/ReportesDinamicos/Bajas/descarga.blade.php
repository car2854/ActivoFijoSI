<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REPORTES DE BAJAS</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilospdf.css">
  </head>
<body>
  <header>
      <p class="mt-5">--------LISTADO DE BAJAS------</p>
  </header>
    <div class="container align-items-center">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col" class="text-center">Codigo Bien</th>
                <th scope="col" class="text-center">Nombre Bien</th>
                <th scope="col" class="text-center">Custodio</th>
                <th scope="col" class="text-center">Operador</th>
                <th scope="col" class="text-center">Fecha Baja</th>
                <th scope="col" class="text-center">Categoria</th>
              </tr>
            </thead>
            <tbody>
				<?php foreach ($data as $r) { ?>
					<tr>
                        <td class="text-center">{{$r->CodigoBien}}</td>
                        <td class="text-center">{{$r->NombreBien}}</td>
                        <td class="text-center">{{$r->NombreCustodio}}</td>
                        <td class="text-center">{{$r->NombreOperador}}</td>
                        <td class="text-center">{{$r->FechaHora}}</td>
                        <td class="text-center">{{$r->NombreCategoria}}</td>
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




