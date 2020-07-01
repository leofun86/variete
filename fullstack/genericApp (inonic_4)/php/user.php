<?php
  include('conexion.php');
  if (isset($_GET['opUser']) && isset($_POST ['nombre']) && isset($_POST ['apellido']) && (isset($_GET ['ci']) || isset($_POST ['ci']))) {
    $opUser = $_GET['opUser'];
    $nombre = $_POST ['nombre'];
    $apellido = $_POST ['apellido'];
    $ci = $_POST ['ci'];

    switch ($opUser) {
      case 1:
        $ci = "user".substr($ci, -4);
        $sql = "INSERT INTO paciente (CIPaciente, Nombre, Apellido)
        values ('$ci', '$nombre', '$apellido')";
        $ex = $conexion->query($sql);
        header("Location: ../user_validar.php?op=1");
        break;
      case 2:
        $ci = $_GET['ci'];
        $sql = "UPDATE paciente SET Nombre='$nombre', Apellido='$apellido' WHERE CIPaciente='".$ci."'";
        $ex = $conexion->query($sql);
        header("Location: ../user_validar.php?op=2");
        break;
    }

  } else {
    header("Location: ../user_validar.php?op=z");
  }
  if (isset($_GET['opUser']) && isset($_GET['ci'])) {
    $opUser = $_GET['opUser'];
    $ci = $_GET['ci'];
    switch ($opUser) {
      case 3:
        $sql = "UPDATE paciente SET Activo=false WHERE CIPaciente='".$ci."'";
        $ex = $conexion->query($sql);
        header("Location: ../user_validar.php?op=3");
        exit();
        break;
      case 4:
        if (isset($_GET['ci']) && isset($_POST['sala'])) {
          $ci = $_GET['ci'];
          $fecha = date('Y:m:d');
          $hora = date('H:i');
          $sala = $_POST['sala'];
          $estado = "Inicio de evento";
          $sql = "INSERT INTO operacion (CIPaciente, Fecha, Hora, Estado, Sala) values ('$ci', '$fecha', '$hora', '$estado', '$sala')";
          $exe = $conexion->query($sql);
          $sql = "UPDATE evento SET activo=true WHERE ci='".$ci."'";
          $exe = $conexion->query($sql);
          header("Location: ../user_validar.php?op=4");
        }
      break;
      case 5:
        if (isset($_GET['ci']) && isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['sala'])) {
          $ci=$_GET['ci'];
          $fecha=$_POST['fecha'];
          $hora=$_POST['hora'];
          $sala=$_POST['sala'];
          mysqli_query($conexion, "UPDATE operacion SET Fecha='$fecha', Hora='$hora', Sala='$sala' WHERE CIPaciente='".$ci."'");
          header("Location: ../user_validar.php?op=5");
        }
      break;
      case 6:
        if (isset($_GET['ci'])) {
          $ci = $_GET['ci'];
          if(mysqli_query($conexion, "UPDATE operacion SET Activo=0 WHERE CIPaciente='".$ci."' AND Activo=1")) {
            mysqli_query($conexion, "UPDATE operacion SET Activo=0 WHERE CIPaciente='".$ci."' AND Activo=1");
            header("Location: ../user_validar.php?op=6");
          } else {
            header("Location: ../user_validar.php?op=z");
          }

        }
      break;
      case 7:
        if (isset($_GET['ci']) && isset($_POST['estado'])) {
          $ci = $_GET['ci'];
          $estado = $_POST['estado'];
          if (mysqli_query($conexion, "UPDATE operacion SET Estado='$estado' WHERE CIPaciente='".$ci."' AND Activo=1")) {
            mysqli_query($conexion, "UPDATE operacion SET Estado='$estado' WHERE CIPaciente='".$ci."' AND Activo=1");
            header("Location: ../event_user.php?ci=".$ci);
          } else {
            header("Location: ../user_validar.php?op=z");
          }
        }
      break;
    }
  }
  $conexion->close();
?>
