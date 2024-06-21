<?php

if(!empty($_POST["btn-actualizar"])){
  if (!empty($_POST["name"]) &&!empty($_POST["last-name"]) && !empty($_POST["cedula"]) &&!empty($_POST["date"])) {
    $id = $_POST["id"];
    $token = $_POST["token"];
    $nombre = $_POST["name"];
    $apellido = $_POST["last-name"];
    $cedula = $_POST["cedula"];
    $fecha = $_POST["date"];

    
    $nombre = $conexion->real_escape_string($nombre);
    $apellido = $conexion->real_escape_string($apellido);
    $cedula = $conexion->real_escape_string($cedula);
    $fecha = $conexion->real_escape_string($fecha);
    $id = $conexion->real_escape_string($id);


    $sql = $conexion->query("UPDATE usuarios SET nombre='$nombre', apellido='$apellido', cedula='$cedula', fecha_nacimiento='$fecha' WHERE token='$token'");
    
    if ($sql) {
      header("location: index.php");
      exit();
    }
    else {
      echo '<div class="alert alert-danger">Error al modificar la persona</div>';
    }
  }
  else {
    echo '<div class="alert alert-warning">Todos los campos son obligatorios</div>';
  }
}

?>