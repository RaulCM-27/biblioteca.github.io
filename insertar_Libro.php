<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<?php
include("conexion.php");
$con = conectar();

$codigo = $_POST['Cod'];
$nombre = $_POST['Nom'];
$categoria = $_POST['Cat'];
$imagen = $_FILES['Img'];

// Verifica si se ha subido una imagen
if ($imagen && $imagen['tmp_name']) {
    // Lee la imagen y convierte a binario
    $imagenData = file_get_contents($imagen['tmp_name']);

    // Inserta el libro con la imagen como BLOB
    $stmt = $con->prepare("INSERT INTO libros (codigo, nombre, categoria, imagen) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $codigo, $nombre, $categoria, $imagenData);

    if ($stmt->execute()) {
        header("Location: libros.php");
    } else {
        echo '<div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="alert alert-warning" role="alert">Error en el Ingreso del registro</div>
                        <th><input type="button" value="Página anterior" onClick="history.go(-1);"></th>
                    </div>
                </div>
            </div>';
    }
    $stmt->close();
} else {
    echo '<div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="alert alert-danger" role="alert">Código del libro vacío</div>
                    <th><input type="button" value="Página anterior" onClick="history.go(-1);"></th>
                </div>
            </div>
        </div>';
}
?>
</body>
</html>