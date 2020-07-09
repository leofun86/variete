<!DOCTYPE html>
<html lang="es">

<head>
    <title>Mutual App</title>
    <?php include('html_header.html'); ?>
</head>

<body>
  <div style="display:flex;flex-direction:column;justify-content:center;align-items:center;height:100%;">
    <div fullscreen class="col-lg-4 col-md-8 col-sm-12 pl-3 pr-3 pt-1 pb-4" style="background:#eee;border-radius:10px;">
      <center>
        <h1 style="color:#999;">Bienvenido a Generic App</h1>
        <h3 class="btn-info p-1">Usuarios</h3>
        <a href="user_list.php" class="">Listado de usuarios</a><br>
        <a href="user_add.php" class="">Agregar un usuario</a>
        <h3 class="btn-info p-1">Eventos</h3>
        <a href="event_live.php" target="contenido" class="">Eventos en vivo</a><br>
      </center>
    </div>
  </div>
  <?php include('html_footer.html'); ?>
</body>

</html>
