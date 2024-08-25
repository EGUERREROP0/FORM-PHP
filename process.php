<?php
require './config/database.php';
$db = conectarDB();

$query = "SELECT * FROM producto";
$resultado = mysqli_query($db, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <main class="container">
        <h1 class="text-center">Productos</h1>
        <a href="./index.php" class="btn btn-warning mt-4">Volver</a>
        <table class="table table-striped mt-1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_assoc($resultado)): ?>
                    <tr>
                        <th><?php echo $data['id']; ?></th>
                        <td><?php echo $data['codigo']; ?></td>
                        <td><?php echo $data['nombre']; ?></td>
                        <td><?php echo $data['precio']; ?></td>
                        <td><?php echo $data['cantidad']; ?></td>
                        <td><?php echo $data['descripcion']; ?></td>


                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>