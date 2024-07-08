<?php 
    include("conexion.php");
    include("menu.html");
    $con=conectar();

    $sql="SELECT * FROM libros";
    $query=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>LIBROS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#libros').DataTable({
                "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
            });
        });
    </script>
    <script type="text/javascript">
        function confirmDelete() {
            var respuesta = confirm("Seguro que desea borrar?");
            if (respuesta == true) {
                alert("Registro Borrado");
                return true;
            } else {
                alert("Ha decidido no borrar el registro");
                return false;
            }
        }
    </script>
</head>
<body>
    <div class="content">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">
                    <h1><span class="badge bg-dark">Ingrese datos</span></h1>
                    <form action="insertar_Libro.php" method="POST" enctype="multipart/form-data">
                        <input type="text" class="form-control mb-3" name="Cod" placeholder="Codigo Libro">
                        <input type="text" class="form-control mb-3" name="Nom" placeholder="Nombre">
                        <input type="text" class="form-control mb-3" name="Cat" placeholder="Categoria">
                        <input type="file" class="form-control mb-3" name="Img" placeholder="Imagen" accept="image/*">
                        <input type="submit" class="btn btn-primary" value="Agregar">
                    </form>
                </div>
                <div class="col-md-8">
                    <table id="libros" class="table table-light table-striped table-bordered shadow-lg mt-4" style="width:100%">
                        <thead class="bg-warning">
                            <tr align="center">
                                <th>Codigo Libro</th>
                                <th>Nombre</th>
                                <th>Categoria</th>
                                <th>Imagen</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row=mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?php echo $row['codigo'] ?></td>
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><?php echo $row['categoria'] ?></td>
                                    <td style="text-align:center">
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['imagen']); ?>" alt="Imagen del libro" style="width: 100px; height: auto;">
                                    </td>
                                    <td style="text-align:center"><a href="actualizarLibro.php?codigo=<?php echo $row['codigo'] ?>"><button type="button" class="btn btn-info">Editar</button></a></td>
                                    <td style="text-align:center"><a href="deleteLibro.php?codigo=<?php echo $row['codigo'] ?>"><button type="button" class="btn btn-danger" onclick="return confirmDelete()">Eliminar</button></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>