<?php

require './config/database.php';

$db = conectarDB();

$errores = [];

//Eviatar perder ya! datos
$codigo = "";
$nombre = "";
$precio = "";
$cantidad = "";
$descripcion = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];

    //Validar campos
    if (!$codigo) {
        $errores[] = 'Inserte un codigo';
    }

    if (!$nombre) {
        $errores[] = 'Inserte un nombre';
    }

    if (!$precio) {
        $errores[] = 'Inserte un precio';
    }

    if (!$cantidad) {
        $errores[] = 'Inserte una cantidad';
    }

    if (!$descripcion) {
        $errores[] = 'Inserte una descrpcion';
    }


    if (empty($errores)) {
        $query = "INSERT INTO producto(codigo, nombre, precio, cantidad, descripcion) 
        VALUES('$codigo', '$nombre', '$precio', '$cantidad', '$descripcion')";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            echo '<script type="text/javascript">
                alert("Producto guardado correctamente");
                window.location.href="index.php";
                </script>';
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fromulario Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <main class="container d-flex align-items-center flex-column">
        <h1 class="text-center mt-5 mb-5">Registro de productos</h1>

        <?php foreach ($errores as $error): ?>

            <div class="bg-danger-subtle mb-2 p-2 w-50 rounded fw-bold text-center border-4">
                <?php echo $error ?>
            </div>

        <?php endforeach ?>

        <form action="./index.php" method="POST" class="w-50 card p-4 mb-5">

            <div class="mb-2">
                <label class="form-label" for="codigo">Codigo</label>
                <input class="form-control" type="number" name="codigo" placeholder="Codigo Producto">
            </div>

            <div class="mb-2">
                <label class="form-label" for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" placeholder="Nombre Producto">

            </div>

            <div class="mb-2">
                <label class="form-label" for="precio">Precio</label>
                <input class="form-control" type="number" name="precio" placeholder="Precio Producto">

            </div>

            <div class="mb-2">
                <label class="form-label" for="cantidad">Cantidad</label>
                <input class="form-control" type="number" name="cantidad" placeholder="Cantidad Producto">

            </div>

            <div class="mb-2">
                <label class="form-label" for="descripcion">Descripcion</label>
                <textarea class="form-control" name="descripcion" id="" placeholder="Descripcion producto"></textarea>
            </div>

            <input class="btn btn-success" type="submit" value="Registrar producto">
        </form>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>