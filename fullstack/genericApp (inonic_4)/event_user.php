<!DOCTYPE html>
<html lang="es">

<head>
    <title>Mutual App</title>
    <?php include('html_header.html'); ?>
</head>

<body style="height:100%;">
  <ion-app>
      <div class="ion-page" id="main-content">
        <ion-content fullscreen scroll-x="true">
        <ion-card-header class="headerFrm" style="width:100%!important;position:fixed!important;z-index:2222;">
          <ion-card-title>Operación de paciente</ion-card-title>
        </ion-card-header>
        <br><br><br>
        <ion-card-content>
          <?php
            if (isset($_GET['ci'])) {
              include('php/conexion.php');
              $ci=$_GET['ci'];
              $result = mysqli_query($conexion, "SELECT * FROM operacion WHERE CIPaciente='".$ci."' AND Activo=1");
              if ($reg = $result->fetch_assoc()) {
                $result2 = mysqli_query($conexion, "SELECT * FROM paciente WHERE CIPaciente='".$ci."'");
                if ($reg2 = $result2->fetch_assoc()) {
                  echo $reg2['Nombre'].' '.$reg2['Apellido'].' // '.$reg['Fecha'].' // '.$reg['Hora'].'<br>Estado actual: '.$reg['Estado'];
                  echo '
                    <br><br>
                    <h2>Actualización de estado</h2><br>
                    <form action="php/user.php?ci='.$ci.'&opUser=7" method="post">
                      <input class="form-control" type="text" name="estado" placeholder="Escribir estado"><br>
                      <input type="submit" class="btn btn-success" value="Actualizar">
                      <a class="btn btn-danger" href="user_list.php" target="contenido">Volver</a>
                    </form>';
                }
              }
              $conexion->close();
            }
          ?>
        </ion-card-content>
      </ion-content>
    </div>
  </ion-app>
  <?php include('html_footer.html'); ?>
</body>

</html>
