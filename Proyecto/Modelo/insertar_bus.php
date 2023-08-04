<?php
include("../Config/conexion.php");

$nombre = $_POST['conductor'];
$placa = $_POST['placa'];

$sql = "SELECT placa FROM Transporte WHERE placa='$placa'";
$res = mysqli_query($conexion, $sql);


if (mysqli_num_rows($res) == 0) {
    $sql = "INSERT into Transporte(nombre_responsable,placa) values('$nombre', '$placa')";
    $estado = mysqli_query($conexion, $sql);



    if ($estado) {
        // Redirigir de vuelta a la página con el botón de enviar
        $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/agregar_bus.php';
        header("Location: " . $return_url . "?success=true");
        exit();
    } else {
        // Redirigir de vuelta a la página con el botón de enviar
        $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/agregar_bus.php';
        header("Location: " . $return_url . "?success=false");
        exit();
    }
} else {
    // Redirigir de vuelta a la página con el botón de enviar
    $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/agregar_bus.php';
    header("Location: " . $return_url . "?success=duplicado");
    exit();
}




?>