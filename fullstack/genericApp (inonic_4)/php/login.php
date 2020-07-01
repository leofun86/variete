<?php
include('conexion.php');
if (isset($_POST['ci']) && isset($_POST['pass'])){
  $ci=$_POST['ci'];
  $pass=$_POST['pass'];
  $sql="SELECT * FROM admin WHERE CIAdmin='".$ci."' AND Pass='".$pass."'";
  $result = $conexion->query($sql);
  if($result->fetch_assoc()){
    header("Location:../index2.php?ci=".$ci);
  }else {
    header("Location:../index.php?log=1");
  }
}
$conexion->close();
?>
