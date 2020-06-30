<?php
  require 'conexion.php';
  sleep(2);
  if (isset($_POST['user_lg']) && isset($_POST['pass_lg'])) {
    $usuarios = $mysqli->query("SELECT Nombre, Tipo_usuario FROM usuarios WHERE Usuario='".$_POST['user_lg']."' AND Password='".$_POST['pass_lg']."'");
  }
  //Si la petición tiene una fila de coincidencia
  if ($usuarios->num_rows == 1) {
    $datos = $usuarios->fetch_assoc();
    echo json_encode(array('error' => false, 'tipo' => $datos['Tipo_usuario']));
  } else {
    echo json_encode(array('error' => true));
  }

  $mysqli->close();
?>
