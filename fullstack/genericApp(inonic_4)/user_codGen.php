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
          <ion-card-title>Código de invitación</ion-card-title>
        </ion-card-header>
        <br><br><br><br>
        <ion-card-content>
          <center>
            <?php
              include('php/conexion.php');
              if (isset($_GET['ci'])) {
                $ci = $_GET['ci'];

                $query = "SELECT * FROM paciente WHERE CIPaciente='".$ci."'";
                $result = $conexion->query($query);
                if ($reg = $result->fetch_assoc()) {
                    echo '<h2>'.$reg['Nombre'].' '.$reg['Apellido'].'</h2>';
                    do {
                      $cod = sprintf('%04X%04X%04X%', mt_rand(0,655535), mt_rand(0,655535), mt_rand(0,655535), mt_rand(0,655535));
                      $query = "SELECT * FROM paciente WHERE Codigo='".$cod."'";
                      $resultCode = $conexion->query($query);
                    } while ($reg = $resultCode->fetch_assoc());
                    $query = "UPDATE paciente SET Codigo='$cod' WHERE CIPaciente='".$ci."'";
                    $ex = $conexion->query($query);
                    $query = "SELECT * FROM paciente WHERE CIPaciente='".$ci."'";
                    $ex = $conexion->query($query);
                    if ($reg = $ex->fetch_assoc()) {
                      echo '
                        <h1 class="btn bg-ligth" style="cursor:default!important;">'.$reg['Codigo'].'</h1>
                        <br>
                        <a href="user_list.php" class="btn btn-success">ACEPTAR</a>'
                      ;
                    }
                }
              }
              $conexion->close();
            ?>
          </center>
        </ion-card-content>
      </ion-content>
    </div>
  </ion-app>
  <?php include('html_footer.html'); ?>
</body>

</html>
