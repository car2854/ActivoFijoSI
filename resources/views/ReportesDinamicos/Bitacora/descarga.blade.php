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
                <th scope="col" class="text-center">Usuario</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Accion Realizada</th>
                <th scope="col" class="text-center">Fecha y Hora de la accion</th>
                <th scope="col" class="text-center">Rol</th>
              </tr>
            </thead>
            <tbody>
				<?php foreach ($data as $r) { ?>
					<tr>
                        <td class="text-center">{{$lis->name}}</td>
                        <td class="text-center">{{$lis->email}}</td>
                        <td class="text-center">{{$lis->accion}}</td>
                        <td class="text-center">{{$lis->fechaAccion}}</td>
                        <td class="text-center">{{$lis->rol}}</td>
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






