<?php
    include('conexion.php');
    $salida = "";

    if (isset($_POST['ci'])) {
      if (strlen($_POST['ci']) == 8) {
    	$q = "user".substr($conexion->real_escape_string($_POST['ci']), -4);
    	$query = "SELECT * FROM paciente WHERE CIPaciente='".$q."'";
      $resultado = $conexion->query($query);

      if ($resultado->fetch_assoc()) {
      	$salida.="<center style='margin-top:40px!important;margin-bottom:40px!important;color:red;font-size:20px;'>La cédula ya existe =(</center>";
      }else{
        $salida.='
          <div class="form-group mt-4">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" minlength="3" maxlength="15" required>
          </div>
          <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" minlength="3" maxlength="20" required>
          </div>
        ';
      	/*$salida.='
          <br>
          <div class="form-group">
            <label for="email">Correo</label>
            <input type="email" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" aria-describedby="emailHelp" required>
            <div id="datosEmail"></div>
            <!--<small id="emailHelp" class="form-text text-muted">Nunca compartiremos el correo electrónico ni otro dato personal.</small>-->
            <script type="text/javascript" src="js/user_emailAdd.js"></script>
          </div>
        ';*/
      }
    }
  } else {
    $salida.="";
  }
  echo $salida;
  $conexion->close();
?>
