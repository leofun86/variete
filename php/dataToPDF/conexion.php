<?php
    $mysqli = new mysqli('localhost', 'root', '', 'doc_topdf_bd');
    //$mysqli = new mysqli('localhost', 'id14335381_lfunes', '!proyectContra2', 'id14335381_proyect_bd');
    if (mysqli_connect_errno()) {
        echo 'ERROR: '.$mysqli->connect_error;
        exit();
    } else {
        //echo 'Conectado a la Base de Datos';
    }
?>