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


    // Aquí puedes utilizar el valor del id y name como necesites en tu lógica de servidor.

    // Por ejemplo, si necesitas usar el id y name para realizar alguna consulta o acción en la base de datos, puedes hacerlo aquí.

    // Después de procesar la solicitud, devolver una respuesta al cliente.
    // Por ejemplo, si los cambios se guardaron correctamente, devuelve "guardado", de lo contrario, devuelve "no_guardado".
    $respuesta = ($cambios === "realizados") ? "guardado" : "no_guardado";
    echo $respuesta;
} else {
    // Devuelve una respuesta de error si la solicitud no es correcta.
    http_response_code(400);
    echo "Error en la solicitud";
}
?>