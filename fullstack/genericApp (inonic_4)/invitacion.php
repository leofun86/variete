<!DOCTYPE html>
<html lang="es">

<head>
    <title>Mutual App</title>
    <?php include('header.html'); ?>
</head>

<body>
    <ion-app>
          <ion-content>
              <ion-grid style="background-image:url('media/backIndex3.jpg');background-size:cover;width:100%;height:100%;">
                <ion-row style="border:0;height:100%;">
                    <ion-col size-lg="6" size-md="8" size-sm="12" style="margin:0 auto!important;">
                      <form action="login.php" method="post" style="border:2px solid #bbb;padding:20px;border-radius:5px;background:white;margin-top:20%;">
                        <ion-card-header style="border-radius:5px;text-align:center;color:#bbb!important;">
                          <ion-card-title style="color:#888!important;">INGRESO FAMILIARES</ion-card-title>
                        </ion-card-header>
                        <div class="form-group">
                          <input type="text" class="form-control" name="ci" id="ci" minlength="8" maxlength="8" placeholder="Ingrese código de invitación" required>
                        </div>
                        <!--<div class="form-group">
                          <input type="text" class="form-control" name="pass" id="pass" minlength="8" maxlength="20" placeholder="pass" >
                        </div>-->
                        <center>
                          <button type="submit" id="btnFin" class="btn btn-primary col-5 mr-1">Ingresar</button>
                        </center>
                      </form>
                    </ion-col>
                </ion-row>
              </ion-grid>
          </ion-content>
        </div>
      </ion-app>
      <?php include('footer.html'); ?>
</body>

</html>
