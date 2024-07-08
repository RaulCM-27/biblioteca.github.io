<?php

include("conexion.php");
$con = conectar();

$codigo=$_POST['codigo'];
$codigoLibro=$_POST['codigoLibro'];
$idEstudiante=$_POST['idEstudiante'];
$fechaPrestamo=$_POST['fechaPrestamo'];
$fechaDevolucion=$_POST['fechaDevolucion'];
$estado=$_POST['estado'];

$sql = "UPDATE prestamos SET codigo = '$codigo', codigoLibro = '$codigoLibro', idEstudiante = '$idEstudiante', fechaPrestamo = '$fechaPrestamo', fechaDevolucion = '$fechaDevolucion', estado = '$estado' WHERE codigo = '$codigo'";

$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: prestamos.php");
}
?>