<!DOCTYPE html>
<html lang="es">

<head>
    <title>Generic App</title>
    <?php include('html_header.html'); ?>
</head>

<body>
    <ion-app>
        <?php include('php/menu.php') ?>
        <div class="ion-page" id="main-content">
          <ion-header>
            <ion-toolbar>
              <ion-buttons slot="start">
                <ion-menu-button></ion-menu-button>
              </ion-buttons>
              <ion-title>Generic App</ion-title>
            </ion-toolbar>
          </ion-header>
          <!--<ion-content class="ion-padding">
            <ion-button expand="block" onclick="openMenu()">Open Menu</ion-button>
          </ion-content>-->
          <ion-content>
              <ion-grid style="background-image:url('media/backIndex3.jpg');background-size:cover;width:100%;height:100%;">
                <ion-row style="border:0;height:100%;">
                    <ion-col size-lg="12" size-md="10" size-sm="12" style="margin:0 auto!important;">
                        <iframe src="home.php" name="contenido" style="height=100%;"></iframe>
                    </ion-col>
                </ion-row>
              </ion-grid>
          </ion-content>
        </div>
      </ion-app>
      <!-- <div style="width:100%;height:100%;background-image:url('media/backIndex2.jpg');background-size:cover;"></div> -->
      <?php include('html_footer.html'); ?>
      <!--
      <script>
        const tbSearch = document.querySelector('#tbSearch');

        tbSearch.addEventListener('keypress', (e) => {
          if (e.key == 'Enter') {
            const search = tbSearch.value;
            console.log(search);
          }
        })
      </script>
      -->
</body>

</html>
