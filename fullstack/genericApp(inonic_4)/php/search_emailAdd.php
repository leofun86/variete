<?php
    include('conexion.php');
    $salida = "";

    function isValidEmail($email){
      return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    if (isset($_POST['email'])) {
    	$q = $conexion->real_escape_string($_POST['email']);
    	if (!isValidEmail($q)) {
        $salida.="<center style='margin-top:40px!important;margin-bottom:40px!important;color:red;font-size:20px;'>Correo no válido =(</center>";
      } else {
        $query = "SELECT * FROM usuario WHERE email='".$q."'";
        $resultado = $conexion->query($query);
        if ($reg = $resultado->fetch_assoc()) {
        	$salida.="<center style='margin-top:40px!important;margin-bottom:40px!important;color:#3386ff;font-size:20px;'>El correo existe =(</center>";
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
            <div class="form-group">
              <label for="cel">Celular</label>
              <input type="text" class="form-control" name="cel" id="cel" maxlength="9">
            </div>
          ';
        }
      }
    } else {
      $salida.="";
    }
    echo $salida;
    $conexion->close();
?>
