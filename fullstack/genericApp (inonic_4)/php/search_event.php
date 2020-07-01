<?php
    include('conexion.php');
    $salida = "";

    $query = "SELECT * FROM operacion WHERE Activo=1";

    if (isset($_POST['evento'])) {
    	$a = $conexion->real_escape_string($_POST['evento']);
      $b = substr($a, -4);
      $query = "SELECT * FROM operacion WHERE CIPaciente LIKE '%".$b."' AND Activo=1";
    }

    $resultado = $conexion->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table class='table' class='contenedor'>
				<thead>
					<tr>
						<th scope='col'>Nombre</th>
						<th scope='col'>Apellido</th>
            <th scope='col'>Sala</th>
						<th scope='col'>Estado</th>
					</tr>
				</thead>
				<tbody>";

    	while ($reg = $resultado->fetch_assoc()) {
        $ci=$reg['CIPaciente'];
        $query = "SELECT * FROM paciente WHERE CIPaciente='".$ci."'";
        $result = $conexion->query($query);
          while ($reg2 = $result->fetch_assoc()) {
            $salida.="<tr>
    					<td>".$reg2['Nombre']."</td>
    					<td>".$reg2['Apellido']."</td>
              <td>".$reg['Sala']."</td>
              <td>".$reg['Estado']."</td>
            ";
          }
    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="
				<br><br><br><br>
				<center>
					<p style='font-size:20px;color:#3386ff;'>
						    No se encontraron datos :(
					</p>
				</center>";
    }
    echo $salida;
    $conexion->close();
?>
