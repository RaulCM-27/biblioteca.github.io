<?php

include("conexion.php");
$con = conectar();

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$curso=$_POST['curso'];

$sql = "UPDATE estudiantes SET id = '$id', nombre = '$nombre', apellido = '$apellido', curso = '$curso' WHERE id = '$id'";

$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: estudiantes.php");
}
?>