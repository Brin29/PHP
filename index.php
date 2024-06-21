<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <script src="https://kit.fontawesome.com/3986b54a9a.js" crossorigin="anonymous"></script>
  <title>CRUD with PHP and MySQL</title>
</head>
<body>
  <h1 class="text-center">Hello World</h1>
  <?php
    include "model/conexion.php";
    include "controller/eliminar_persona.php"
  ?>

  <div class="container-fluid row">
    <form class="col-4 p-5" method="POST" id="formulario">
      <h3 class="text-center text-secondary">Registrar Persona</h3>
      <?php
        include "controller/registrar_persona.php";
      ?>

    <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="name" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="apellido" name="last-name">
  </div>
  <div class="mb-3">
    <label for="ced" class="form-label">Cedula</label>
    <input type="text" class="form-control" id="ced" name="cedula">
  </div>
  <div class="mb-3">
    <label for="fecha" class="form-label">Fecha de nacimiento</label>
    <input type="date" class="form-control" id="fecha" name="date">
  </div>
  
  <button type="submit" class="btn btn-primary" name="btn-registrar" value="OK">Registrar</button>
</form>


  <div class="col-7 p-5">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">C.C</th>
      <th scope="col">Fecha de Nacimiento</th>
      <th scope="col">Actualizar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php
      include "model/conexion.php";
      $sql = $conexion->query("SELECT * FROM usuarios");
      while($datos = $sql->fetch_object()){ ?>
  <tr>
      <th scope="row"><?= $datos-> id?></th>
      <td><?= $datos-> nombre?></td>
      <td><?= $datos-> apellido?></td>
      <td><?= $datos-> cedula?></td>
      <td><?= $datos-> fecha_nacimiento?></td>
      <td>
        <a href="modificar_persona.php?token=<?= $datos->token?>"
        class = "btn btn-small btn-warning"><i class="fa-solid fa-user-pen"></i></a>
      </td>
      <td>  
        <a onclick="return eliminar()" href="index.php?token=<?=$datos->token?>" class="btn btn-small btn-danger"><i class="fa-solid fa-pen-to-square"></i></a>
      </td>
</tr>

    <?php }

      ?>

  </tbody>
</table>
</div>
</div>
  
<script>
  function eliminar() {
    return confirm("¿Está seguro de eliminar este registro?");
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>