<?php

require './config/database.php';

$db = conectarDB();
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if (!$email) {
        $errores[] = 'Rellene el campo email';
    }
    if (!$password) {
        $errores[] = 'Rellene el campo Contraseña';
    }

    if (empty($errores)) {

        $query = "SELECT * FROM usuario WHERE email = '$email'";
        $response = mysqli_query($db, $query);

        if ($response->num_rows) {
            $usuario = mysqli_fetch_assoc($response);
            $verificarPassword  = password_verify($password, $usuario['password']);

            if ($verificarPassword) {
                session_start();
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('location: /TRABAJOS/PHP-MYSQL/formRegister.php');
            } else {
                $errores[] = 'Contraseña Incorrecta';
            }
        } else {
            $errores[] = "El email no existe";
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
        <h1 class="text-center mt-5 mb-5">LogIn</h1>

        <?php foreach ($errores as $error): ?>
            <p class="p-2 text-center bg-danger w-50"><?php echo $error ?></p>
        <?php endforeach ?>

        <form method="POST" class="w-50 card p-4 mb-5">

            <div class="mb-2">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="correo@correo.com">
            </div>

            <div class="mb-2">
                <label class="form-label" for="password">Contraseña</label>
                <input class="form-control" type="passsword" name="password" placeholder="Ingresar contraseña">

            </div>

            <input class="btn btn-success" type="submit" value="Registrar producto">
        </form>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>