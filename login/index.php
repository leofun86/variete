<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login con PHP + MySQL + Jquery</title>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <div class="error">
      <span>Datos de ingreso no válidos, inténtalo de nuevo</span>
    </div>
    <div class="main">
      <form action="" id="form_lg" class="form_lg">
        <h2 class="resultado">Iniciar Sesión</h2>
        <input type="text" name="user_lg" placeholder="Usuario" required><br>
        <input type="password" name="pass_lg" placeholder="Contraseña" required><br>
        <input type="submit" class="btn_lg" id="btn_lg" value="Iniciar Sesión">
      </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- MAIN -->
    <script src="js/main.js"></script>
  </body>
</html>
