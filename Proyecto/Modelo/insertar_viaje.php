<?php
include("../Config/conexion.php");

$salida = $_POST['lugar-salida'];
$destino = $_POST['lugar-destino'];
$fecha = $_POST['fecha-viaje'];
$hora = $_POST['hora-salida'];
$bus = $_POST['codigo-bus'];
$precio = str_replace('$', '', $_POST['precio-viaje']);


$sql = "INSERT INTO viaje(origen,destino,fecha, hora, precio, id_bus) VALUES('$salida', '$destino', '$fecha', '$hora', '$precio', '$bus')";
$estado =  mysqli_query($conexion, $sql);

if ($estado) {
    // Redirigir de vuelta a la página con el botón de enviar
    $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/agregar_viaje.php';
    header("Location: " . $return_url . "?success=true");
    exit();
} else {
    // Redirigir de vuelta a la página con el botón de enviar
    $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/agregar_viaje.php';
    header("Location: " . $return_url . "?success=false");
    exit();
}  
?>