<?php
  if (!empty($_POST["btn-registrar"])){

    if (!empty($_POST["name"]) && !empty($_POST["last-name"]) && !empty($_POST["cedula"]) && !empty($_POST["date"])) {
      
      $nombre = $_POST["name"];
      $apellido = $_POST["last-name"];
      $cedula = $_POST["cedula"];
      $fecha = $_POST["date"];
    

    $nombre_valido = preg_match("/^[a-zA-ZáéíóúÁÉÍÓÑñ\s]+$/", $nombre);
    $apellido_valido = preg_match("/^[a-zA-ZáéíóúÁÉÍÓÑñ\s]+$/", $apellido);
    $cedula_valida = preg_match("/^\d+$/", $cedula);

    //Codigo poniendo de nombre la cedula//
    $token = md5($_POST["name"]. "+" .$_POST["cedula"]);

  
  
      if ($nombre_valido && $apellido_valido && $cedula_valida) {
        $sql = $conexion->query("INSERT INTO usuarios (token, nombre, apellido, cedula, fecha_nacimiento) VALUES('$token', '$nombre', '$apellido', '$cedula', '$fecha')");

        if ($sql) {
          echo '<div class="alert alert-succes">Persona registrada correctamente</div>';
        } else {
          echo '<div class="alert alert-danger">Error al registrar </div>';
        }
      }
      else {
        if (!$nombre_valido) {
          echo '<div class="alert alert-warning">Nombre inválido. Solo puede contener letras</div>';
        }
        if (!$apellido_valido) {
          echo '<div class="alert alert-warning">Apellido inválido. Solo puede contener letras</div>';
        }
        if (!$cedula_valida) {
          echo '<div class="alert alert-warning">Cédula inválida. Solo puede contener números</div>';
        }
      }
    }
      else {
        echo '<div class="alert alert-warning">Todos los campos son obligatorios</div>';
      }
    
  }
