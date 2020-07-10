<?php
    $mysqli = new mysqli('localhost', 'root', '', 'doc_topdf_bd');
    if (mysqli_connect_errno()) {
        echo 'ERROR: '.$mysqli->connect_error;
        exit();
    } else {
        //echo 'Conectado a la Base de Datos';
    }
?>