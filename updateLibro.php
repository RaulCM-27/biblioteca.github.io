<?php

include("conexion.php");
$con = conectar();

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$imagen = $_FILES['imagen'];

// Verifica si se ha subido una imagen
if ($imagen && $imagen['tmp_name']) {
    // Lee la imagen y convierte a binario
    $imagenData = file_get_contents($imagen['tmp_name']);

    // Prepara la consulta para actualizar con la nueva imagen
    $stmt = $con->prepare("UPDATE libros SET nombre = ?, categoria = ?, imagen = ? WHERE codigo = ?");
    $stmt->bind_param("sssi", $nombre, $categoria, $imagenData, $codigo);
} else {
    // Prepara la consulta para actualizar sin cambiar la imagen
    $stmt = $con->prepare("UPDATE libros SET nombre = ?, categoria = ? WHERE codigo = ?");
    $stmt->bind_param("ssi", $nombre, $categoria, $codigo);
}

if ($stmt->execute()) {
    header("Location: libros.php");
    exit();
} else {
    echo '<div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="alert alert-warning" role="alert">Error en la actualización del registro: ' . $stmt->error . '</div>
                    <button onclick="history.go(-1);" class="btn btn-secondary">Página anterior</button>
                </div>
            </div>
        </div>';
}

$stmt->close();
$con->close();

?>