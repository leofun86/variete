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
