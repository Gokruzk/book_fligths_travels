<?php
include("../Config/conexion.php");

$salida = $_POST['lugar-salida'];
$destino = $_POST['lugar-desitno'];
$fecha = $_POST['fecha-viaje'];
$hora = $_POST['hora-salida'];
$bus = $_POST['codigo-bus'];
$precio = $_POST['precio-viaje'];


$sql = "INSERT into viaje(origen,destino,fecha, hora) values('$salida', '$destino', '$fecha', '$hora')";
mysqli_query($conexion, $sql);
?>