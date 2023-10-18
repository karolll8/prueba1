<?php
include('encriptar.pro.php');

$a = $_GET['documento'];
$b = $_GET['clave'];

$usuario = autenticar($a, $b);


if ($usuario !== false) {
    $salida="";
    $salida.= "<table border='3'>";
    $salida.= "<tr><th>Id</th><th>Nombre_usuario</th><th>Correo</th><th>Contraseña</th><th>Cumpleaños</th><th>Telefono</th><th>N°</th></tr>";
    $salida.= "<tr>";
    $salida.= "<td>" . $usuario->Id . "</td>";
    $salida.= "<td>" . $usuario->Nombre_usuario . "</td>";
    $salida.= "<td>" . $usuario->Correo . "</td>";
    $salida.= "<td>" . $usuario->Contraseña . "</td>";
    $salida.= "<td>" . $usuario->Cumpleaños . "</td>";
    $salida.= "<td>" . $usuario->Telefono . "</td>";
    $salida.= "<td>" . $usuario->N° . "</td>";
    $salida.= "</tr>";
    $salida.= "</table>";

    echo $salida;
} else {
    echo "error de digitación. intentelo otra vez";
}

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
