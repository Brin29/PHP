<?php
include "model/conexion.php";
$token = $_GET["token"];
$sql = $conexion->query("SELECT * FROM usuarios WHERE token = '$token'");

if ($sql->num_rows > 0) {
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Modificar Persona</title>
</head>
<body>

    <form class="col-4 p-3 m-auto" method="POST" id="formulario">
      <h3 class="text-center text-secondary">Modificar Persona</h3>
      <?php
        include "./controller/modificar_persona.php";
        while ($datos = $sql->fetch_object()){
      ?>

    <input type="hidden" id="token" name="token" value="<?= $datos->token?>">
    <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="name" value="<?= $datos->nombre?>">
  </div>

  <div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="apellido" name="last-name" value="<?=$datos->apellido?>">
  </div>

  <div class="mb-3">
    <label for="ced" class="form-label">Cedula</label>
    <input type="text" class="form-control" id="ced" name="cedula" value="<?=$datos->cedula?>">
  </div>

  <div class="mb-3">
    <label for="fecha" class="form-label">Fecha de nacimiento</label>
    <input type="date" class="form-control" id="fecha" name="date" value="<?=$datos->fecha_nacimiento?>">
  </div>
  <?php }?>

  <?php if ($sql->num_rows > 0) { ?>
    <button type="submit" class="btn btn-primary" name="btn-actualizar" value="OK">Actualizar</button>
    <?php } ?>
</form> 

</body>
</html>
<?php }
else {
  echo "<div class='alert alert-danger'>No se encontraron datos para modificar</div>";
}
?>