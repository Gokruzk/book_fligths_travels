<?php
include("../Config/conexion.php");

$id = $_POST['id_viaje'];
$origen = $_POST['lugar_origen'];
$destino = $_POST['lugar_destino'];
$fecha = $_POST['fecha_viaje'];
$hora = $_POST['hora_salida'];
$placa = $_POST['placa_bus'];
$precio = $_POST['precio_viaje'];

$sql = "UPDATE Viaje SET lugar_origen='$origen', 
lugar_destino='$destino', 
fecha='$fecha', 
hora='$hora', 
precio='$precio', 
placa='$placa'  
where id_viaje='$id'";

$estado = mysqli_query($conexion, $sql);

if ($estado) {
    // Redirigir de vuelta a la página con el botón de enviar
    $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/editar_viaje.php';
    header("Location: " . $return_url . "?edit=true");
    exit();
} else {
    // Redirigir de vuelta a la página con el botón de enviar
    $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/editar_viaje.php';
    header("Location: " . $return_url . "?edit=false");
    exit();
}