<?php
include('encriptar.pro.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $documento = $_POST['documento'];
    $clave = $_POST['clave'];

    

    $conexion = mysqli_connect('localhost', 'root', 'root', 'RUBLE_FORGOTAPP_PROYECT');

    if (!$conexion) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    $clave = encriptar($clave);

    $sqlEliminar = "DELETE FROM Usuarios WHERE Id = '$documento' AND Contraseña = '$clave';";

    if ($conexion->query($sqlEliminar) === TRUE) {
        echo "Usuario eliminado correctamente.";
        
        header("Location: archivo1.php");
        exit;
    } else {
        echo "Error al eliminar el usuario: " . $conexion->error;
    }

    $conexion->close();
}

$escr = "<table>";
$escr .= "<form method='POST'>";
$escr .= "<tr>";
$escr .= "<td>Documento:</td>";
$escr .= "<td><input type='text' name='documento' required></td>";
$escr .= "</tr>";
$escr .= "<tr>";
$escr .= "<td>Contraseña:</td>";
$escr .= "<td><input type='password' name='clave' required></td>";
$escr .= "</tr>";
$escr .= "<tr>";
$escr .= "<td colspan='2'><input type='submit' value='Eliminar Usuario'></td>";
$escr .= "</tr>";
$escr .= "</form>";
$escr .= "</table>";

echo $escr;
