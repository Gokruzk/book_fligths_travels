<?php
include("../Config/conexion.php");

$nombre = $_POST['conductor'];
$placa = $_POST['placa'];

$sql = "UPDATE Transporte SET nombre_responsable='$nombre', 
placa='$placa'
where placa='$placa'";

$estado = mysqli_query($conexion, $sql);

if ($estado) {
    // Redirigir de vuelta a la página con el botón de enviar
    $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/editar_bus.php';
    header("Location: " . $return_url . "?edit=true");
    exit();
} else {
    // Redirigir de vuelta a la página con el botón de enviar
    $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/editar_bus.php';
    header("Location: " . $return_url . "?edit=false");
    exit();
}