<?php 
    include("conexion.php");
    $con=conectar();

$codigo=$_GET['codigo'];

$sql="SELECT * FROM prestamos WHERE codigo='$codigo'";

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
                    <form action="updateP.php?$row['codigo']&$row['codigoLibro']&$row['idEstudiante']&$row['fechaPrestamo']&$row['fechaDevolucion']&$row['estado']" method="POST">
                                <label for="codigo">Codigo:</label>
                                <input type="text" class="form-control mb-3" name="codigo" placeholder="Codigo" value="<?php echo $row['codigo']  ?>">
                                <label for="codigoLibro">Codigo Libro:</label>
                                <input type="text" class="form-control mb-3" name="codigoLibro" placeholder="Codigo Libro" value="<?php echo $row['codigoLibro']  ?>">
                                <label for="idEstudiante">ID Estudiante:</label>
                                <input type="text" class="form-control mb-3" name="idEstudiante" placeholder="ID Estudiante" value="<?php echo $row['idEstudiante']  ?>">
                                <label for="fechaPrestamo">Fecha Prestamo:</label>
                                <input type="date" class="form-control mb-3" name="fechaPrestamo" id="fechaPrestamo" value="<?php echo $row['fechaPrestamo'] ?>">
                                <label for="fechaDevolucion">Fecha Devolucion:</label>
                                <input type="date" class="form-control mb-3" name="fechaDevolucion" id="fechaDevolucion" value="<?php echo $row['fechaDevolucion'] ?>">
                                <label for="estado">Estado:</label>
                                <select class="form-select mb-3" name="estado" id="estado">
                                   <option value="Prestado" <?php if ($row['estado'] == 'Prestado') echo 'selected' ?>>Prestado</option>
                                   <option value="Atrasado" <?php if ($row['estado'] == 'Atrasado') echo 'selected' ?>>Atrasado</option>
                                   <option value="Devuelto" <?php if ($row['estado'] == 'Devuelto') echo 'selected' ?>>Devuelto</option>
                                </select>

                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>