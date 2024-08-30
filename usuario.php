<?php

require './config/database.php';

$db = conectarDB();

$email = 'correo@gmail.com';
$password = '12345';

$password = password_hash($password, PASSWORD_BCRYPT);


$query = "INSERT INTO usuario(email, password) VALUES('$email', '$password')";
$insert = mysqli_query($db, $query);
