<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $cumpleaños = $_POST['cumpleaños'];
    $telefono = $_POST['telefono'];
    $categoria = $_POST['categoria'];

    // Asegúrate de validar y procesar los datos según tus necesidades antes de registrarlos en la base de datos.

    $conexion = mysqli_connect('localhost', 'root', 'root', 'RUBLE_FORGOTAPP_PROYECT');

    if (!$conexion) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    
    
    $fechaCumpleaños = date("Y-m-d", strtotime($cumpleaños));

    $sql = "DELETE FROM Usuarios(Id, Nombre_usuario, Correo, Contraseña, Cumpleaños, Telefono, N°) VALUES ('$documento', '$nombre', '$correo', '$clave', '$fechaCumpleaños', '$telefono', '$categoria');";

    if ($conexion->query($sql) === TRUE) {
        echo "Registro exitoso";
        header("Location: archivo1.php");
    exit;
    } else {
        echo "Error en el registro: " . $conexion->error;
    }

    $conexion->close();

}

$escr= "";
$escr = "<table>";
$escr .= "<form method='POST'>";
$escr .= "<tr>";
$escr .= "<td>Documento:</td>";
$escr .= "<td><input type='text' name='documento' required></td>";
$escr .= "</tr>";
$escr .= "<tr>";
$escr .= "<td>Nombre:</td>";
$escr .= "<td><input type='text' name='nombre' required></td>";
$escr .= "</tr>";
$escr .= "<tr>";
$escr .= "<td>Correo:</td>";
$escr .= "<td><input type='email' name='correo' required></td>";
$escr .= "</tr>";
$escr .= "<tr>";
$escr .= "<td>Contraseña:</td>";
$escr .= "<td><input type='password' name='clave' required></td>";
$escr .= "</tr>";
$escr .= "<tr>";
$escr .= "<td>Fecha de Cumpleaños:</td>";
$escr .= "<td><input type='date' name='cumpleaños' required></td>";
$escr .= "</tr>";
$escr .= "<tr>";
$escr .= "<td>Teléfono:</td>";
$escr .= "<td><input type='text' name='telefono' required></td>";
$escr .= "</tr>";
$escr .= "<tr>";
$escr .= "<td>Categoría:</td>";
$escr .= "<td><input type='text' name='categoria' required></td>";
$escr .= "</tr>";
$escr .= "<tr>";
$escr .= "<td colspan='2'><input type='submit' value='Registrar'></td>";
$escr .= "</tr>";
$escr .= "</form>";
$escr .= "</table>";

echo $escr;

?>
