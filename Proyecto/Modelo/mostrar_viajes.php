<?php
include('../Config/conexion.php');
$sql = 'SELECT * FROM Viaje WHERE fecha>= CURDATE()';
$res = mysqli_query($conexion, $sql);
?>