<?php
// Procesar la solicitud AJAX y obtener el id y name enviados
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["cambios"]) && isset($_POST["name"])) {
    $cambios = $_POST["cambios"];
    $id = $_POST["name"];

    include("../Config/conexion.php");
    $sql = "UPDATE asientos
    set id_reserva=NULL 
    where id_reserva = $id";
    mysqli_query($conexion, $sql);

    $sql = "DELETE 
    FROM Reserva
    where id_reserva = $id";

    mysqli_query($conexion, $sql);


    $respuesta = ($cambios === "realizados") ? "guardado" : "no_guardado";
    echo $respuesta;
} else {
    // Devuelve una respuesta de error si la solicitud no es correcta.
    http_response_code(400);
    echo "Error en la solicitud";
}
?>