// Obtener referencia al elemento select
const selectElement = document.getElementById('select-viaje');

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

    const destino = document.getElementById('destino-id');
    const destinoValor = document.getElementById('valor-destino');
    
    const origen = document.getElementById('origen-id');
    const origenValor = document.getElementById('valor-origen');

    // Mostrar diferentes mensajes según la opción seleccionada
    switch (opcionSeleccionada) {
        case '1':
            destino.style.display = "flex";
            destinoValor.value = '';

            destinoValor.setAttribute('required', '');

            origen.style.display = "none";
            origenValor.removeAttribute('required');

            break;
        case '2':
            origen.style.display = "flex";
            origenValor.value = '';

            origenValor.setAttribute('required', '');

            destino.style.display = "none";
            destinoValor.removeAttribute('required');
            break;
    }
}