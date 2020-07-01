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
          <ion-card-title>Operaciones en vivo</ion-card-title>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" id="searchEvent" class="form-control col-lg-4 col-sm-6" name="searchEvent" placeholder="Buscar evento por cédula">
            &nbsp&nbsp&nbsp
          </div>
          <!--<div class="form-control col-lg-2 col-sm-6 mt-1">
            <label>Activos</label>
            <input type="radio" name="userEstado" value="activo">
            <label>Inactivos</label>
            <input type="radio" name="userEstado" value="inactivo">
          </div>-->

        </ion-card-header>
        <br><br><br><br>
        <ion-card-content>
          <div class="table-responsive">
            <!--<table class="table">
              <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Nombre</th>
                <th scope="col">correo</th>
                  <th scope="col">celular</th>
                </tr>-->
                <div id="datosEvent">

                </div>
              <!--</thead>
              <tbody>

                <?php
                  /*include('php/conexion.php');
                  $registros = mysqli_query($conexion, "SELECT * FROM usuario");
                  while ($reg = mysqli_fetch_array($registros)) {
                    echo '<tr>';
                    echo '<td>'.$reg['nombre'].'</td>';
                    echo '<td>'.$reg['apellido'].'</td>';
                    echo '<td>'.$reg['email'].'</td>';
                    echo '<td>'.$reg['celular'].'</td>';
                    echo '<td><a href="editUser.php?id='.$reg['id'].'&op=2">Editar</a></td>';
                    echo '<td><a href="delUser.php?id='.$reg['id'].'">Eliminar</a></td>';
                    echo '</tr>';
                  }*/
                ?>
              </tbody>
            </table>-->
          </div>
        </ion-card-content>
      </ion-content>
    </div>
  </ion-app>
  <?php include('html_footer.html'); ?>
  <script src="js/event.js"></script>
</body>

</html>
