<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar viaje</title>
    <link rel="icon" href="../../images/favicon.png" />
</head>

<body>
    <?php
    // Capturar el ID del viaje desde el parámetro en la URL
    $id_viaje = $_GET['id_viaje'] ?? '';
    $precio = $_GET['precio'] ?? '';
    $us = $_GET['ced'] ?? '';

    // Verificar si se recibió el ID del viaje en la URL
    if (empty($id_viaje)) {
        echo "Error: No se proporcionó el ID del viaje.";
        exit();
    }

    ?>
    <a href="../../index.html">Inicio</a>
    <a href="../Vista/viajes_list.php?ced=<?php echo $us ?>">
        <button class="btnBack">
            <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024">
                <path
                    d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z">
                </path>
            </svg>
            <span>Regresar</span>
        </button>
    </a>
    <h1>Descripción y reserva del viaje seleccionado</h1>


    <form action="../Modelo/reservar.php?id_viaje=<?php echo $id_viaje ?>" method="post">

        <?php include("../Modelo/mostrar_viaje_reserva.php"); ?>

        <label for="cedula">Número de cédula del cliente:</label>
        <input style="border:  0;" readonly type="text" id="cedula" name="cedula" value="<?php echo $us ?>">
        <br>
        <label for="fecha_reserva">Fecha de reserva:</label>
        <input readonly style="border:  0;" type="date" id="fecha_reserva" name="fecha_reserva" required>
        <br>
        <label for="cantidad_adul">Cantidad de adultos:</label>
        <input type="number" id="cantidad_adul" name="cantidad_adul" value="1" min="1" required>
        <br>
        <label for="cantidad_ni">Cantidad de niños:</label>
        <input type="number" id="cantidad_ni" name="cantidad_ni" value="0" min="0" required>
        <br>
        <label id="total">Total: </label>
        <br>
        <input type="submit" value="Reservar">
    </form>

    <script>
        // Crear un objeto Date con la fecha actual
        var fecha = new Date();

        // Obtener los componentes de la fecha (año, mes y día)
        var anio = fecha.getFullYear();
        var mes = fecha.getMonth() + 1; // Los meses en JavaScript comienzan desde 0 (enero) hasta 11 (diciembre)
        var dia = fecha.getDate();

        // Formatear la fecha en el formato "yyyy-MM-dd"
        var fechaActualTexto = anio + "-" + (mes < 10 ? "0" : "") + mes + "-" + (dia < 10 ? "0" : "") + dia;

        // Asignar la fecha al campo de entrada
        document.getElementById("fecha_reserva").value = fechaActualTexto;
    </script>
    <script>
        // Obtener los elementos del DOM
        const cantidadAdulInput = document.getElementById("cantidad_adul");
        const cantidadNiInput = document.getElementById("cantidad_ni");
        const totalLabel = document.getElementById("total");

        // Función para calcular el total y actualizar el label
        function calcularTotal() {
            // Obtener los valores de los inputs
            const cantidadAdul = parseInt(cantidadAdulInput.value) || 0; // Parsear a número o usar 0 si no se puede parsear
            const cantidadNi = parseInt(cantidadNiInput.value) || 0; // Parsear a número o usar 0 si no se puede parsear

            // Calcular el total
            let precio = <?php echo $precio; ?>;
            const total = (cantidadAdul * precio) + (cantidadNi * precio / 2);

            // Actualizar el label con el total
            totalLabel.textContent = "Total: $" + total.toFixed(2);
        }

        // Agregar eventos de escucha a los inputs para llamar a la función calcularTotal cuando haya un cambio en los valores
        cantidadAdulInput.addEventListener("input", calcularTotal);
        cantidadNiInput.addEventListener("input", calcularTotal);

        // Calcular el total inicial al cargar la página
        calcularTotal();
    </script>

</body>

</html>