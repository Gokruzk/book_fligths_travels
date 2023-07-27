<?php
include("../Config/conexion.php");

$id = $_POST['id_bus'];
$origen = $_POST['nombre_responsable'];
$destino = $_POST['placa'];

$sql = "UPDATE bus SET nombre_responsable='$origen', 
placa='$destino'
where id_bus='$id'";

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