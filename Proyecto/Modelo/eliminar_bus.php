<?php
include("../Config/conexion.php");
$placa = $_REQUEST['placa'];
$sql = "DELETE from Transporte where placa='$placa'";

try {
    $estado = mysqli_query($conexion, $sql);
} catch (Exception $e) {
    // Handle the exception or error here
    echo "Error: " . $e->getMessage() . " (Error code: " . $e->getCode() . ")";

    if ($e->getCode() == 1451) {
        // Redirigir de vuelta a la página con el botón de enviar
        $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/editar_bus.php';
        header("Location: " . $return_url . "?del=1451");
        exit();
    }
} finally {
    if ($estado) {
        // Redirigir de vuelta a la página con el botón de enviar
        $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/editar_bus.php';
        header("Location: " . $return_url . "?del=true");
        exit();
    } else {
        // Redirigir de vuelta a la página con el botón de enviar
        $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/editar_bus.php';
        header("Location: " . $return_url . "?del=false");
        exit();
    }
}
?>