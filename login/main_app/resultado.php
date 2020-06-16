<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login con PHP + MySQL + Jquery</title>
    <link rel="stylesheet" href="../css/main.css">
  </head>
  <body>
    <div class="main">
      <form action="" id="form_lg" class="form_lg">
        <?php
          $tipo = $_GET['tipo'];

          switch($tipo) {
            case 'admin':
              echo '<h2 class="resultado">¡Bienvenido Admin!</h2>';
            break;
            case 'usuario':
              echo '<h2 class="resultado">¡Bienvenido Usuario!</h2>';
            break;
            default:
              echo '<p class="resultado">Ha habido un error, inténtelo de nuevo</p>';
            break;
          }

          echo '<a class="btn_back" href="../index.php">Volver</a>';

        ?>
      </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </body>
</html>
