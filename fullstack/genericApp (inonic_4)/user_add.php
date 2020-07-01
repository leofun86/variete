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
            <ion-card-title>Alta de usuario</ion-card-title>
          </ion-card-header>
          <ion-card-content>
            <form action="php/user.php?opUser=1" method="post">
            <!--<form>-->
            <br>
              <div class="form-group">
                <label for="ci">Cédula</label>
                <input type="text" class="form-control" name="ci" id="ci" minlength="8" maxlength="8" required>
                <div id="datosCi"></div>
              </div>
              <!--
                <div class="form-group">
                  <label for="tipoUsuario">Tipo de usuario</label>
                  <select id="tipoUsuario" name="tipoUsuario" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="paciente">Paciente</option>
                    <option value="familiar">Familiar</option>
                  </select>
                </div>
              -->
              <center>
                <button type="submit" id="btnFin" class="btn btn-primary col-5 mr-1">Terminar</button>
                <button type="reset" id="btnReset" class="btn btn-danger col-5">Limpiar</button>
              </center>
            </form>
        </ion-card-content>
      </ion-content>
    </div>
  </ion-app>
  <?php include('html_footer.html'); ?>
  <script type="text/javascript" src="js/user_ciAdd.js"></script>
  <script type="text/javascript">
    const nombre = document.querySelector('#nombre');
    const apellido = document.querySelector('#apellido');
    const ci =document.querySelector('#ci');
    const email = document.querySelector('#email');
    const celular = document.querySelector('#cel');
    const btnFin = document.querySelector('#btnFin');
    const btnReset = document.querySelector('#btnReset');

    btnReset.addEventListener('click', () => {
      nombre.value="";
      apellido.value="";
      ci.value="";
      email.value="";
      celular.value="";
      email.value="";
    })

  </script>
</body>

</html>
