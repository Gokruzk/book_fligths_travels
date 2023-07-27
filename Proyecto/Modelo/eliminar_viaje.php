<?php
 include("../Config/conexion.php");
 $id=$_REQUEST['id_viaje'];
 $sql = "DELETE from viaje where id_viaje=$id";
 $estado=mysqli_query($conexion,$sql);

if ($estado) {
    // Redirigir de vuelta a la página con el botón de enviar
    $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/editar_viaje.php';
    header("Location: " . $return_url . "?del=true");
    exit();
} else {
    // Redirigir de vuelta a la página con el botón de enviar
    $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/editar_viaje.php';
    header("Location: " . $return_url . "?del=false");
    exit();
}
?>