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
                    echo '¡Evento agregado!</ion-label>';
                    echo '<p><a class="btn btn-success mt-2" href="user_add.php">Volver</a></p>';
                    break;
                  case 2:
                    echo '¡Cambios de evento guardados!</ion-label>';
                    echo '<p><a class="btn btn-success mt-2" href="user_list.php">Volver</a></p>';
                    break;
                  case 3:
                    echo '¡Usuario dado de baja!</ion-label>';
                    echo '<p><a class="btn btn-success mt-2" href="user_list.php">Volver</a></p>';
                    break;
                  case "z":
                    echo 'Hubo errores en la operación';
                    echo '<p><a class="btn btn-success mt-2" href="index2.php">Volver</a></p>';
                    break;
                }
              ?>
            </center>
        </ion-card-content>
      </ion-content>
    </div>
  </ion-app>
  <?php include('html_footer.html'); ?>
  <script type="text/javascript" src="js/usuarios.js"></script>
  <script type="text/javascript">
    const nombre = document.querySelector('#nombre');
    const apellido = document.querySelector('#apellido');
    const email = document.querySelector('#email');
    const celular = document.querySelector('#cel');
    const btnFin = document.querySelector('#btnFin');
    const btnReset = document.querySelector('#btnReset');

    btnReset.addEventListener('click', () => {
      nombre.value = "";
      apellido.value = "";
      email.value = "";
      celular.value = "";
    })

  </script>
</body>

</html>
