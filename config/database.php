<?php
function conectarDB(): mysqli
{
    $db =  mysqli_connect('localhost', 'root', 'root', 'trabajos');

    if (!$db) {
        echo "Error en la conexion";
        exit();
    }

    return $db;
}
