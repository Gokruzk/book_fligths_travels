$(document).ready(function () {
    // Función para mostrar el primer alert
    function mostrarAlert1(name) {
        if (confirm("¿Está seguro de cancelar su reserva? Este cambio es irreversible")) {
            // Obtener el id que deseas enviar al servidor desde algún elemento del HTML

            // Si el usuario hace clic en "Sí", enviar una solicitud AJAX al servidor
            $.ajax({
                url: "../Modelo/cancelar.php",
                type: "POST",
                data: { cambios: "realizados", name: name }, // Agregar el id y name al objeto de datos
                success: function (response) {
                    // Mostrar el segundo alert en función de la respuesta del servidor
                    if (response === "guardado") {
                        alert("Se ha eliminado correctamente su reserva");
                        location.reload();
                    } else {
                        alert("No se ha modificado su reserva");
                    }
                },
                error: function () {
                    alert("Hubo un error al cancelar la reserva");
                }
            });
        } else {
            alert("No se ha modificado su reserva");
        }
    }

    // Llamar la función para mostrar el primer alert al hacer clic en cualquier botón con clase "btnGuardar"
    $(".btnGuardar").on("click", function () {
        var name = $(this).attr("name"); // Obtener el valor del atributo "name" del botón
        console.log("El name de este es: ", name);
        mostrarAlert1(name);
    });
});