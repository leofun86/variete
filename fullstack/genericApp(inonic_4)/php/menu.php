<ion-menu side="start" content-id="main-content">
  <ion-header>
    <ion-toolbar translucent>
      <ion-title>Menu</ion-title>
    </ion-toolbar>
  </ion-header>
  <ion-content>
    <ion-list>
      <ion-item>
        <ion-icon name="home-outline"></ion-icon>
        <ion-label><a href="index2.php">&nbsp&nbspInicio</a></ion-label>
      </ion-item>
      <!--
      <ion-item>
        <ion-icon name="person-outline"></ion-icon>
        <ion-label id="btnUser"><a href="usuarios.php" target="contenido">&nbsp&nbspUsuarios</a></ion-label>
      </ion-item>
      -->
      <ion-item>
        <ion-icon name="person-outline"></ion-icon>
        <ion-label id="btnUser"><a href="user_list.php" target="contenido">&nbsp&nbspUsuarios</a></ion-label>
      </ion-item>
      <ul id="menUser" style="display:none;" class="mt-2">
        <li><ion-icon name="chevron-forward-outline" style="position:relative;top:3px;color:#666;"></ion-icon><a href="user_list.php" target="contenido">&nbsp&nbspListado</a></li>
        <li><ion-icon name="chevron-forward-outline" style="position:relative;top:3px;color:#666;"></ion-icon><a href="user_add.php" target="contenido">&nbsp&nbspAgregar</a></li>
      </ul>
      <ion-item>
        <ion-icon name="calendar-outline"></ion-icon>
        <ion-label id="btnOpe"><a href="event_live.php" target="contenido">&nbsp&nbspEventos</a></ion-label>
      </ion-item>
      <ul id="menOpe" style="display:none;" class="mt-2">
        <li><ion-icon name="chevron-forward-outline" style="position:relative;top:3px;color:#666;"></ion-icon><a href="event_list.php" target="contenido">&nbsp&nbspListado</a></li>
        <!--<li><ion-icon name="chevron-forward-outline" style="position:relative;top:3px;color:#666;"></ion-icon><a href="event_add.php" target="contenido">&nbsp&nbspAgendar</a></li>-->
        <li><ion-icon name="radio-button-on-outline" style="color:red!important;position:relative;top:3px;color:#666;"></ion-icon><a href="event_live.php" target="contenido">&nbsp&nbspEn vivo</a></li>
      </ul>
      <ion-item>
        <ion-icon name="help-outline"></ion-icon>
        <ion-label>&nbsp&nbsp<a href="#">Centro de ayudas</a></ion-label>
      </ion-item>
	  <ion-item>
        <ion-icon name="log-out-outline"></ion-icon>
        <ion-label><a href="php/logout.php">&nbsp&nbspCerrar sesión</a></ion-label>
      </ion-item>
    </ion-list>
  </ion-content>
</ion-menu>
<script type="text/javascript">
const btnUser = document.querySelector('#btnUser');
//const menUser = document.querySelector('#menUser');
const btnOpe = document.querySelector('#btnOpe');
const menOpe = document.querySelector('#menOpe');

/*btnUser.addEventListener('click', () => {
  if(menUser.style.display === "none") {
    menUser.style.display = "block";
  } else {
    menUser.style.display = "none";
  }
})*/
/*btnOpe.addEventListener('click', () => {
  if (menOpe.style.display === "none") {
    menOpe.style.display = "block";
  } else {
    menOpe.style.display = "none";
  }
})*/

</script>
