<!DOCTYPE html>
<html lang="es">

<head>
    <title>Mutual App</title>
    <?php include('html_header.html'); ?>
</head>

<body>
  <ion-app>
    <div class="ion-page" id="main-content">
      <ion-content fullscreen scroll-y="false">
        <ion-card-header color="secondary">
          <ion-card-title>Edición de usuario</ion-card-title>
        </ion-card-header>
        <ion-card-content>
          <?php
            include('php/conexion.php');
            $ci = $_GET ['ci'];
            echo '<form action="php/user.php?opUser=2&ci='.$ci.'" method="post">';
            $query = mysqli_query($conexion, "SELECT * from paciente where CIPaciente='".$ci."'");

            if ($reg = mysqli_fetch_array($query)) {
              echo '
              <br>
              <h1>'.$reg['CIPaciente'].'</h1>
              <div class="form-group mt-4">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" minlength="3" maxlength="15" value="'.$reg['Nombre'].'" required>
              </div>
              <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellido" minlength="3" maxlength="20" value="'.$reg['Apellido'].'" required>
              </div>
              <center>
                <button type="submit" id="btnFin" class="btn btn-success col-5 mr-1">Terminar</button>
              </center>
              </form>';
            }
            $conexion->close();
          ?>
        </ion-card-content>
      </ion-content>
    </div>
  </ion-app>
  <?php include('html_footer.html'); ?>
</body>

</html>
