<!DOCTYPE html>
<html lang="es">

<head>
    <title>Mutual App</title>
    <?php include('html_header.html'); ?>
</head>

<body>
  <ion-app>
      <div class="ion-page" id="main-content">
        <ion-content fullscreen scroll-y="true">
          <ion-card-header color="secondary">
            <ion-card-title>Edición de evento</ion-card-title>
          </ion-card-header>
          <ion-card-content>
            <?php
            if (isset($_GET ['ci'])) {
              $ci = $_GET['ci'];
              echo '<form action="php/user.php?opUser=5&ci='.$ci.'" method="post">';
                  include('php/conexion.php');
                  $query = mysqli_query($conexion, "SELECT * FROM evento WHERE ci='".$ci."'");
                  $query2 = mysqli_query($conexion, "SELECT * from usuario where ci='".$ci."'");

                  if ($reg = mysqli_fetch_assoc($query)) {
                    if($reg2 = mysqli_fetch_assoc($query2)) {
                      echo '
                      <br>
                      <h2 style="color:#3386ff;font-size:20px;">'.$reg2['nombre'].' '.$reg2['apellido'].' - '.$reg2['ci'].' - '.$reg2['email'].'</h2><br>
                      <div class="form-group">
                        <label for="cel">Fecha</label>
                        <input type="date" class="form-control" name="fecha" id="fecha" maxlength="9" value="'.$reg['fecha'].'">
                      </div>
                      <div class="form-group">
                        <label for="cel">Hora</label>
                        <input type="time" class="form-control" name="hora" id="hora" maxlength="9" value="'.$reg['hora'].'">
                      </div>
                      <div class="form-group">
                        <label for="cel">Sala actual: <span style="font-size:20px;color:#3386ff;">'.$reg['sala'].'</span></label><br>
                        <select name="sala" class="form-control">
                          <option value="Sala 1">Sala 1</option>
                          <option value="Sala 2">Sala 2</option>
                          <option value="Sala 3">Sala 3</option>
                          <option value="Sala 4">Sala 4</option>
                        </select>
                      </div>
                      <center>
                        <button type="submit" id="btnFin" class="btn btn-primary col-4 mr-1">Terminar</button>
                        <a href="user_list.php" class="btn btn-danger col-4" style:color:white!important;>Cancelar</a>
                      </center>
                      ';
                    }
                  }
                  $conexion->close();
                } else {
                  echo '<center style="margin:40px 0px!important;">
                          <p style="font-size:20px;color:#3386ff;">No hay datos =(</p><br>
                          <a href="user_list.php" class="btn btn-success" target="contenido">VOLVER</a>
                        </center>';
                }
              ?>
            </form>
        </ion-card-content>
      </ion-content>
    </div>
  </ion-app>
  <?php include('html_footer.html'); ?>
  <script type="text/javascript" src="js/usuarios.js"></script>
</body>

</html>
