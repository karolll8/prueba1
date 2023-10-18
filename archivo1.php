<?php
$a = $_GET['documento'];
$b = $_GET['clave'];
echo "dijita en el link el documento y la clave para buscarlos en la base de datos.<br>
ua";
echo '<a href="autenticar.pro.php?documento=' . $a . '&clave=' . $b . '">ver tabla</a>';
?>
