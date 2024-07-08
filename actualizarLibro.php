<?php 
    include("conexion.php");
    $con=conectar();

$codLibro=$_GET['codigo'];

$sql="SELECT * FROM libros WHERE codigo='$codLibro'";

$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="updateLibro.php?$row['codigo']&$row['nombre']&$row['categoria']&$row['imagen']" method="POST" enctype="multipart/form-data">
                                <input type="text" class="form-control mb-3" name="codigo" placeholder="Codigo Libro" value="<?php echo $row['codigo']  ?>">
                                <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']  ?>">
                                <input type="text" class="form-control mb-3" name="categoria" placeholder="categoria" value="<?php echo $row['categoria']  ?>">
                                <input type="file" class="form-control mb-3" name="imagen" placeholder="Imagen" accept="image/*">
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>