<?php

function autenticar($documento, $clave)
{
    $conexion = mysqli_connect('localhost', 'root', 'root', 'RUBLE_FORGOTAPP_PROYECT');
    $clave = encriptar($clave);
    $sql = "SELECT * FROM Usuarios WHERE Id = '$documento' AND Contraseña = '$clave'";
    $resultado = $conexion->query($sql);

    if ($usuario = $resultado->fetch_object()) {
        $conexion->close();
        return $usuario;
    } else {
        $conexion->close();
        return false;
    }
}
?>
