<?php
  $mysqli = new mysqli('localhost', 'root', '', 'login');
  if ($mysqli->connect_errno) { echo "Error al conectarse con MySQK debido al error ".$mysqli->connect_error; }
?>
