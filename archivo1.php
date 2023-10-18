<?php
$a = $_GET['documento'];
$b = $_GET['clave'];
echo "dijita en el link el documento y la clave para buscarlos en la base de datos.<br>
despues de enter para despues dar clic a ver tabla <br> <br>";
echo '<a href="autenticar.pro.php?documento=' . $a . '&clave=' . $b . '">ver tabla</a>';
?>
