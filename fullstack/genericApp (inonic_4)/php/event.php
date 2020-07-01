<?php
  include('conexion.php');
  if (isset($_GET['opEvent']) && isset($_POST['ci']) && isset($_POST ['fecha']) && isset($_POST ['hora']) && isset($_POST ['sala'])) {
    $opEvent = $_GET['opEvent'];
    $ci = $_POST ['ci'];
    $fecha = $_POST ['fecha'];
    $hora = $_POST ['hora'];
    $sala = $_POST ['sala'];

    switch ($opEvent) {
      case 1:
        $sql = "INSERT INTO evento (ci, fecha, hora, sala)
        values ('$ci', '$fecha', '$hora', '$sala')";
        $ex = $conexion->query($sql);
        header("Location: ../event_validar.php?op=1");
        exit();
        break;
      /*case 2:
        $id = $_GET['id'];
        $sql = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', ci='$ci', email='$email', celular='$celular' WHERE id=$id";
        $ex = $conexion->query($sql);
        header("Location: ../user_validar.php?op=2");
        break;*/
    }

  } else {
    header("Location: ../user_validar.php?op=z");
  }
  if (isset($_GET['opUser'])) {
    $opUser = $_GET['opUser'];
    $id = $_GET['id'];
    switch ($opUser) {
      case 3:
        $sql = "UPDATE usuario SET estado=false WHERE id=$id";
        $ex = $conexion->query($sql);
        header("Location: ../user_validar.php?op=3");
        exit();
        break;
    }
  }
  $conexion->close();
?>
