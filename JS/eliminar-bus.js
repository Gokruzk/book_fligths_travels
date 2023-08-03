$(document).ready(function () {
    // Función para mostrar el primer alert
    function mostrarAlert1(name) {
        if (confirm("¿Está seguro de eliminar un bus? Este cambio es irreversible")) {
            $.ajax({
                url: "../Modelo/eliminar_bus.php",
                type: "POST",
                data: { cambios: "realizados", name: name },
                success: function (response) {
                    if (response === "guardado") {
                        alert("Se ha eliminado correctamente el bus");
                        location.reload();
                    } else {
                        alert("No se pudo realizar la eliminación del bus debido a que existen viajes asociados a la placa que trató de modificar");
                    }
                },
                error: function () {
                    alert("No se pudo eliminar el bus, intente de nuevo");
                }
            });
        } else {
            alert("Se canceló la eliminación del bus");
        }
    }

    // Llamar la función para mostrar el primer alert al hacer clic en cualquier botón con clase "btnCancelar"
    $(".eliminarBus").on("click", function () {
        var name = $(this).attr("name"); // Obtener el valor del atributo "name" del botón
        console.log("La placa aquí es: ", name);
        mostrarAlert1(name);
    });
});
