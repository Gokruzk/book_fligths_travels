<?php
// Procesar la solicitud AJAX y obtener el id y name enviados
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["cambios"]) && isset($_POST["name"])) {
    $cambios = $_POST["cambios"];
    $placa = $_POST["name"];

    include("../Config/conexion.php");
    $sql = "DELETE from Transporte where placa='$placa'";
    $estado = mysqli_query($conexion, $sql);

    if ($estado) {
        $respuesta = ($cambios === "realizados") ? "guardado" : "no_guardado";
        echo $respuesta;
    }

} else {
    http_response_code(400);
    echo "Error en la solicitud";
}
?>