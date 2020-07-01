<!DOCTYPE html>
<html lang="es">

<head>
    <title>Mutual App</title>
    <?php include('html_header.html'); ?>
</head>

<body>
  <ion-app>
      <div class="ion-page" id="main-content">
        <ion-content fullscreen scroll-y="true" scroll-x="false">
          <ion-card-header class="headerFrm">
            <ion-card-title>Creación de operación</ion-card-title>
          </ion-card-header>
          <ion-card-content>
            <center>
              <?php
                if (isset($_GET['ci'])) {
                  include('php/conexion.php');
                  $ci=$_GET['ci'];
                  $query = "SELECT * FROM paciente WHERE CIPaciente='".$ci."'";
                  $result = $conexion->query($query);
                  if ($reg=$result->fetch_assoc()) {
                    echo '
                      <br>
                      <h2>'.$reg['Nombre'].' '.$reg['Apellido'].'</h2>
                      <br>
                      <form action="php/user.php?ci='.$ci.'&opUser=4" method="post">
                        <select name="sala" class="form-control col-3">
                          <option value="1">Sala 1</option>
                          <option value="2">Sala 2</option>
                          <option value="3">Sala 3</option>
                          <option value="4">Sala 4</option>
                        </select>
                        <br>
                        <input type="submit" class="btn btn-success" value="ACEPTAR">
                      </form>
                    ';
                  }
                  $conexion->close();
                }
              ?>
            </center>
          </ion-card-content>
      </ion-content>
    </div>
  </ion-app>
  <?php include('html_footer.html'); ?>
</body>

</html>
