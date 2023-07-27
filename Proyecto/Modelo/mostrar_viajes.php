<?php
include('../Config/conexion.php');
$sql = 'SELECT * FROM Viaje';
$res = mysqli_query($conexion, $sql);
?>