$(document).ready(function () {
    // Función para mostrar el primer alert
    function mostrarAlert1(name) {
        if (confirm("¿Está seguro de eliminar un viaje? Este cambio es irreversible")) {
            $.ajax({
                url: "../Modelo/eliminar_viaje.php",
                type: "POST",
                data: { cambios: "realizados", name: name },
                success: function (response) {
                    if (response === "guardado") {
                        alert("Se ha eliminado correctamente el viaje");
                        location.reload();
                    } else if (response === "ocupado") {
                        alert("No se pudo realizar la eliminación del viaje debido a que existen reservas activas para este");
                    } else {
                        alert("No se pudo realizar la eliminación del viaje");
                    }
                },
                error: function () {
                    alert("No se pudo eliminar el viaje, intente de nuevo");
                }
            });
        } else {
            alert("Se canceló la eliminación del viaje");
        }
    }

    // Llamar la función para mostrar el primer alert al hacer clic en cualquier botón con clase "btnCancelar"
    $(".eliminarViaje").on("click", function () {
        var name = $(this).attr("name"); // Obtener el valor del atributo "name" del botón
        console.log("Id aquí es: ", name);
        mostrarAlert1(name);
    });
});
