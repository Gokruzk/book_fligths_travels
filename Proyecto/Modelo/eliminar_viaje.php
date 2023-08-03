<?php
// Procesar la solicitud AJAX y obtener el id y name enviados
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["cambios"]) && isset($_POST["name"])) {
    $cambios = $_POST["cambios"];
    $id = $_POST["name"];

    $respuesta = $id;

    include("../Config/conexion.php");

    $sql = "SELECT count(id_asiento) as OCUPADOS FROM asientos 
            WHERE id_reserva IS NOT NULL and id_viaje = $id;";

    $resultado = mysqli_query($conexion, $sql);

    $fila = mysqli_fetch_assoc($resultado);
    $ocupados = $fila['OCUPADOS'];

    if ($ocupados > 0) {
        $respuesta = "ocupado";
        echo $respuesta;
    } else {
        $sql = "DELETE from asientos where id_viaje=$id";
        $estado = mysqli_query($conexion, $sql);


        $sql = "DELETE from Viaje where id_viaje=$id";
        $estado = mysqli_query($conexion, $sql);

        if ($estado) {
            $respuesta = ($cambios === "realizados") ? "guardado" : "no_guardado";
            echo $respuesta;
        }
    }



} else {
    http_response_code(400);
    echo "Error en la solicitud";
}
?>