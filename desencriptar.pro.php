<?php
include('encriptar.php');

function desencriptarNombreUsuario($documento)
{
    $conexion = mysqli_connect('localhost', 'root', 'root', 'RUBLE_FORGOTAPP_PROYECT');

    if (!$conexion) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    $sql = "SELECT Nombre_usuario FROM Usuarios WHERE Id = '$documento';";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();
        $nombreEncriptado = $fila['Nombre_usuario'];

        // Desencriptar el nombre de usuario
        $nombreDesencriptado = desencriptar($nombreEncriptado);

        $conexion->close();

        return $nombreDesencriptado;
    } else {
        $conexion->close();
        return "Usuario no encontrado";
    }
}

$documento = '7892'; // Documento del usuario que deseas desencriptar

$nombreDesencriptado = desencriptarNombreUsuario($documento);
echo "Nombre de usuario desencriptado: $nombreDesencriptado";
