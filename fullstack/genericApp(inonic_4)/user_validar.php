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
          <ion-card-content>
            <center>
              <?php
                $op = $_GET ['op'];
                echo '<br><br><br>';
                echo '<ion-label>';
                switch ($op) {
                  case 1:
                    echo '¡Usuario agregado!</ion-label>';
                    echo '<p>
                            <a class="btn btn-success mt-2" href="user_list.php" target="contenido">Usuarios</a>
                            &nbsp
                            <a class="btn btn-success mt-2" href="user_add.php">Agregar +</a>
                          </p>';
                    break;
                  case 2:
                    echo '¡Cambios de usuario guardados!</ion-label>';
                    echo '<p><a class="btn btn-success mt-2" href="user_list.php">Volver</a></p>';
                    break;
                  case 3:
                    echo '¡Usuario dado de baja!</ion-label>';
                    echo '<p><a class="btn btn-success mt-2" href="user_list.php">Volver</a></p>';
                    break;
                  case 4:
                    echo '¡Evento iniciado!</ion-label>';
                    echo '<p>
                            <a class="btn btn-success mt-2" href="user_list.php" target="contenido">Usuarios</a>
                            &nbsp
                            <a class="btn btn-success mt-2" href="event_live.php" target="contenido">Eventos</a>
                          </p>';
                    break;
                  case 5:
                    echo '¡Evento actualizado!</ion-label>
                          <p>
                            <a class="btn btn-success mt-2" href="user_list.php" target="contenido">Usuarios</a>
                            &nbsp
                            <a class="btn btn-success mt-2" href="event_live.php" target="contenido">Eventos</a>
                          </p>';
                    break;
                  case 6:
                    echo '¡Evento terminado!</ion-label>
                          <p>
                            <a class="btn btn-success mt-2" href="user_list.php" target="contenido">Usuarios</a>
                            &nbsp
                            <a class="btn btn-success mt-2" href="event_live.php" target="contenido">Eventos</a>
                          </p>';
                    break;
                  case "z":
                    echo 'Hubo errores en la operación';
                    echo '<p><a class="btn btn-success mt-2" href="index2.php" target="contenido">INICIO</a></p>';
                    break;
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
