<?php

include("conexion.php");
$con=conectar();

$id=$_GET['id'];

$sql="DELETE FROM estudiantes WHERE id='$id'";
//echo $sql;

$query=mysqli_query($con,$sql);
if($query)
{ 
Header("Location: estudiantes.php");
}
?>
