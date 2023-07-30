// Obtener referencia al elemento select
const selectElement = document.getElementById('select-bus');

// Agregar el evento de cambio
selectElement.addEventListener('change', mostrarInput);

// Función para mostrar el mensaje correspondiente
function mostrarInput() {
    if (document.getElementById("estado") != null) {
        document.getElementById("estado").style.display = "none";
    }

    if (document.getElementsByTagName('table').length > 0) {
        var tabla = document.getElementsByTagName('table');
        for (var i = 0; i < tabla.length; i++) {
            tabla[i].style.display = "none"
        }
    }


    const opcionSeleccionada = selectElement.value;

    const placa = document.getElementById('placa-id');
    const placaValor = document.getElementById('valor-placa');
    const conductor = document.getElementById('conductor-id');
    const conductorValor = document.getElementById('valor-conductor');

    // Mostrar diferentes mensajes según la opción seleccionada
    switch (opcionSeleccionada) {
        case '1':
            placa.style.display = "flex";
            placaValor.value = '';

            placaValor.setAttribute('required', '');

            conductor.style.display = "none";
            conductorValor.removeAttribute('required');

            break;
        case '2':
            conductor.style.display = "flex";
            conductorValor.value = '';

            conductorValor.setAttribute('required', '');

            placa.style.display = "none";
            placaValor.removeAttribute('required');
            break;
    }
}