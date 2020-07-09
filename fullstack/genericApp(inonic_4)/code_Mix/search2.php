<?php
    include('conexion.php');
    $salida = "";

    if (isset($_POST['consulta'])) {
    	$q = $conexion->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM usuario WHERE ci='".$q."'";
      $resultado = $conexion->query($query);
      if ($resultado->fetch_assoc()) {
        $salida.="El usuario existe";
      }else{
      	$salida.="El usuario no existe";
      }
    } else {
      $salida.="";
    }

    echo $salida;

    $conexion->close();
?>
