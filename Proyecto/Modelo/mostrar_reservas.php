<?php
include("../Config/conexion.php");
$ced = $_GET['ced'];
$sql = "SELECT id_reserva, lugar_destino, fecha_reserva, fecha
FROM reserva r
JOIN viaje v on r.id_viaje = v.id_viaje WHERE cedula = '$ced'";
$res = mysqli_query($conexion, $sql);

$sql2 = "SELECT correo FROM Usuario WHERE cedula = $ced";
$res2 = mysqli_query($conexion, $sql2);
?>