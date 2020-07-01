<?php
    include('conexion.php');
    $salida = "";

    $query = "SELECT * FROM paciente WHERE Activo=1";

    if (isset($_POST['consulta'])) {
    	$a = $conexion->real_escape_string($_POST['consulta']);
      $b = substr($a, -4);
      $query = "SELECT * FROM paciente WHERE CIPaciente LIKE '%".$b."%' AND Activo=1";
    }

    $resultado = $conexion->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table class='table' class='contenedor'>
				<thead>
					<tr>
            <th scope='col'>Usuario</th>
						<th scope='col'>Nombre</th>
						<th scope='col'>Apellido</th>
						<th scope='col'></th>
            <th scope='col'></th>
            <th scope='col'>Código</th>
            <th scope='col'>Operación</th>
					</tr>
				</thead>
				<tbody>";

    	while ($reg = $resultado->fetch_assoc()) {
    		$salida.="<tr>
          <td>".$reg['CIPaciente']."</td>
          <td>".$reg['Nombre']."</td>
					<td>".$reg['Apellido']."</td>
          <td><a class='btn btn-warning' href='user_edit.php?ci=".$reg['CIPaciente']."&op=2'>Editar</a></td>
		      <td><a class='btn btn-danger' href='php/user.php?ci=".$reg['CIPaciente']."&opUser=3'>Baja</a></td>
		  ";
        if ($reg['Codigo'] != null) {
          $salida.="
            <td><p class='btn bg-light' style='cursor:default!important;';>".$reg['Codigo']."</p></td>";
          $ci=$reg['CIPaciente'];
          $sql = "SELECT * FROM operacion WHERE CIPaciente='".$ci."' AND Activo=1";
          $exe = $conexion->query($sql);
          if ($reg2 = $exe->fetch_assoc()) {
            $salida.= "
              <td>
                <a href='php/user.php?ci=".$ci."&opUser=6' class='btn btn-danger' style='border-radius:4px 0px 0px 4px!important;'>Detener</a>
                <a href='event_user.php?ci=".$ci."' id='btnVer' class='btn btn-info' style='border-radius:0px!important;'>Editar</a>
                <a href='https://wa.me/59896605418?text=Acceder%20a%20operación:%20http://localhost/genericApp/event_list.php' target='_blank' class='btn btn-success' style='border-radius:0px 4px 4px 0px!important;padding-bottom:1px;'><ion-icon name='logo-whatsapp' style='font-size:22px;'></ion-icon></a>
              </td>";
          } else {
            $salida.= "
              <td>
                <a href='event_add.php?ci=".$reg['CIPaciente']."' class='btn btn-success' style='border-radius:4px 0px 0px 4px!important;'>Iniciar</a>
                <a href='#' class='btn btn-secondary' style='border-radius:0px 4px 4px 0px!important;'>Invitar</a>
              </td>";
          }
          $salida.="<td></td>";
        } else {
          $salida.="<td><a class='btn btn-info' href='user_codGen.php?ci=".$reg['CIPaciente']."'>Generar código</a></td>";
        }
    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="
				<br><br><br><br>
				<center>
					<p>
						    No se encontraron datos :(
					</p>
				</center>";
    }
    echo $salida;
    $conexion->close();
?>
