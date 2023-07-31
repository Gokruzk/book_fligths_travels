// Obtener referencia al elemento select
const selectElement = document.getElementById("select-viaje");

// Agregar el evento de cambio
selectElement.addEventListener("change", mostrarInput);

// Función para mostrar el mensaje correspondiente
function mostrarInput() {
    if (document.getElementById("estado") != null) {
        document.getElementById("estado").style.display = "none";
    }

    if (document.getElementsByTagName("table").length > 0) {
        var tabla = document.getElementsByTagName("table");
        for (var i = 0; i < tabla.length; i++) {
            tabla[i].style.display = "none";
        }
    }

    const opcionSeleccionada = selectElement.value;

    const id = document.getElementById("id-id");
    const idValor = document.getElementById("valor-id");

    const origen = document.getElementById("origen-id");
    const origenValor = document.getElementById("valor-origen");

    const destino = document.getElementById("destino-id");
    const destinoValor = document.getElementById("valor-destino");

    const placa = document.getElementById("placa-id");
    const placaValor = document.getElementById("valor-placa");

    const fecha = document.getElementById("fecha-id");
    const fechaValor = document.getElementById("valor-fecha");

    const hora = document.getElementById("hora-id");
    const horaValor = document.getElementById("valor-hora");

    const precio = document.getElementById("precio-id");
    const precioValor = document.getElementById("valor-precio");

    const conductor = document.getElementById("conductor-id");
    const conductorValor = document.getElementById("valor-conductor");

    // Mostrar diferentes mensajes según la opción seleccionada
    switch (opcionSeleccionada) {
        case "0":
            id.style.display = "flex";
            idValor.value = "";

            idValor.setAttribute("required", "");

            origen.style.display = "none";
            origenValor.removeAttribute("required");

            destino.style.display = "none";
            destinoValor.removeAttribute("required");

            placa.style.display = "none";
            placaValor.removeAttribute("required");

            fecha.style.display = "none";
            fechaValor.removeAttribute("required");

            hora.style.display = "none";
            horaValor.removeAttribute("required");

            precio.style.display = "none";
            precioValor.removeAttribute("required");

            conductor.style.display = "none";
            conductorValor.removeAttribute("required");
            break;
        case "1":
            origen.style.display = "flex";
            origenValor.value = "";

            origenValor.setAttribute("required", "");

            id.style.display = "none";
            idValor.removeAttribute("required");

            destino.style.display = "none";
            destinoValor.removeAttribute("required");

            placa.style.display = "none";
            placaValor.removeAttribute("required");

            fecha.style.display = "none";
            fechaValor.removeAttribute("required");

            hora.style.display = "none";
            horaValor.removeAttribute("required");

            precio.style.display = "none";
            precioValor.removeAttribute("required");

            conductor.style.display = "none";
            conductorValor.removeAttribute("required");

            break;
        case "2":
            destino.style.display = "flex";
            destinoValor.value = "";

            destinoValor.setAttribute("required", "");

            id.style.display = "none";
            idValor.removeAttribute("required");

            origen.style.display = "none";
            origenValor.removeAttribute("required");

            placa.style.display = "none";
            placaValor.removeAttribute("required");

            fecha.style.display = "none";
            fechaValor.removeAttribute("required");

            hora.style.display = "none";
            horaValor.removeAttribute("required");

            precio.style.display = "none";
            precioValor.removeAttribute("required");

            conductor.style.display = "none";
            conductorValor.removeAttribute("required");

            break;
        case "3":
            fecha.style.display = "flex";
            fechaValor.value = "";

            fechaValor.setAttribute("required", "");

            id.style.display = "none";
            idValor.removeAttribute("required");

            origen.style.display = "none";
            origenValor.removeAttribute("required");

            placa.style.display = "none";
            placaValor.removeAttribute("required");

            destino.style.display = "none";
            destinoValor.removeAttribute("required");

            hora.style.display = "none";
            horaValor.removeAttribute("required");

            precio.style.display = "none";
            precioValor.removeAttribute("required");

            conductor.style.display = "none";
            conductorValor.removeAttribute("required");

            break;
        case "4":
            hora.style.display = "flex";
            horaValor.value = "";

            horaValor.setAttribute("required", "");

            id.style.display = "none";
            idValor.removeAttribute("required");

            origen.style.display = "none";
            origenValor.removeAttribute("required");

            placa.style.display = "none";
            placaValor.removeAttribute("required");

            fecha.style.display = "none";
            fechaValor.removeAttribute("required");

            destino.style.display = "none";
            destinoValor.removeAttribute("required");

            precio.style.display = "none";
            precioValor.removeAttribute("required");

            conductor.style.display = "none";
            conductorValor.removeAttribute("required");

            break;
        case "5":
            precio.style.display = "flex";
            precioValor.value = "";

            precioValor.setAttribute("required", "");

            id.style.display = "none";
            idValor.removeAttribute("required");

            origen.style.display = "none";
            origenValor.removeAttribute("required");

            placa.style.display = "none";
            placaValor.removeAttribute("required");

            fecha.style.display = "none";
            fechaValor.removeAttribute("required");

            hora.style.display = "none";
            horaValor.removeAttribute("required");

            destino.style.display = "none";
            destinoValor.removeAttribute("required");

            conductor.style.display = "none";
            conductorValor.removeAttribute("required");

            break;
        case "6":
            placa.style.display = "flex";
            placaValor.value = "";

            placaValor.setAttribute("required", "");

            id.style.display = "none";
            idValor.removeAttribute("required");

            origen.style.display = "none";
            origenValor.removeAttribute("required");

            destino.style.display = "none";
            destinoValor.removeAttribute("required");

            fecha.style.display = "none";
            fechaValor.removeAttribute("required");

            hora.style.display = "none";
            horaValor.removeAttribute("required");

            precio.style.display = "none";
            precioValor.removeAttribute("required");

            conductor.style.display = "none";
            conductorValor.removeAttribute("required");

            break;
        case "7":
            conductor.style.display = "flex";
            conductorValor.value = "";

            conductorValor.setAttribute("required", "");

            id.style.display = "none";
            idValor.removeAttribute("required");

            origen.style.display = "none";
            origenValor.removeAttribute("required");

            destino.style.display = "none";
            destinoValor.removeAttribute("required");

            fecha.style.display = "none";
            fechaValor.removeAttribute("required");

            hora.style.display = "none";
            horaValor.removeAttribute("required");

            precio.style.display = "none";
            precioValor.removeAttribute("required");

            placa.style.display = "none";
            placaValor.removeAttribute("required");

            break;
    }
}
