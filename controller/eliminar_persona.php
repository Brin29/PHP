<?php
if (!empty($_GET["token"])) {
  $token = $_GET["token"];

  $sql = $conexion->query("DELETE FROM usuarios WHERE token='$token'");

  if ($sql) {
    echo "<div class='alert alert-succes'>Persona eliminado correctamente</div>";
  } else {
    echo "<div class='alert alert-succes'>Error al elimnar</div>";
  }

}

?>