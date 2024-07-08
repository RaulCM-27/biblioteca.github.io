<?php

include("conexion.php");
$con=conectar();

$codigo=$_GET['codigo'];

$sql="DELETE FROM prestamos WHERE codigo='$codigo'";
//echo $sql;

$query=mysqli_query($con,$sql);
if($query)
{ 
Header("Location: prestamos.php");
}
?>