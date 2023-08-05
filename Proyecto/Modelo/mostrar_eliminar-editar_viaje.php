<?php
include("../Config/conexion.php");
$sql = "SELECT *
FROM Viaje v
inner join Transporte T
on V.placa = T.placa ";

$resultado = mysqli_query($conexion, $sql);

// Obtener la fecha actual
$fechaActual = new DateTime(); // Esto crea un objeto DateTime con la fecha y hora actuales
$fecha = $fechaActual->format('Y-m-d H:i:s');

echo "<script>console.log('La fecha actual es $fecha')</script>";

// Convertir la fecha almacenada en la variable en un objeto DateTime

while ($mostrar = mysqli_fetch_array($resultado)) {
    $fechaComparar = new DateTime($mostrar['fecha']);
    $fechaComparar->setTime(
        (int)substr($mostrar['hora'], 0, 2),
        (int)substr($mostrar['hora'], 3, 2)
    );
    $fecha = $fechaComparar->format('Y-m-d H:i:s');
    echo "<script>console.log('La fecha comparar es $fecha')</script>";
    // Comparar las fechas
    if ($fechaComparar < $fechaActual) {
        ?>
        <tr>
            <td class="id-viaje datosAnterior">
                <?php echo $mostrar['id_viaje'] ?>
            </td>
            <td class="datos datosAnterior">
                <?php echo $mostrar['lugar_origen'] ?>
            </td>
            <td class="datos datosAnterior">
                <?php echo $mostrar['lugar_destino'] ?>
            </td>
            <td class="datos datosAnterior">
                <?php echo $mostrar['fecha'] ?>
            </td>
            <td class="datos datosAnterior">
                <?php echo $mostrar['hora'] ?>
            </td>
            <td class="datos datosAnterior">
                <?php echo $mostrar['precio'] ?>
            </td>
            <td class="datos datosAnterior">
                <?php echo $mostrar['nombre_responsable'] ?>
            </td>
            <td class="datos datosAnterior">
                <?php echo $mostrar['placa'] ?>
            </td>

            <td class="icono"> <a href="../Modelo/editar_viaje.php?id_viaje=<?php echo $mostrar['id_viaje'] ?>"><img
                        class="EditarEliminar" title="Editar bus" src="../../images/editar.png" alt=""></a> </td>
            <td class="icono">
                <a class="eliminarViaje" style="cursor: pointer;" name="<?php echo $mostrar['id_viaje'] ?>">
                    <img class="EditarEliminar" title="Eliminar bus" src="../../images/eliminar.png" alt="">
                </a>
            </td>
        </tr>
        <?php
    } else {
        ?>
        <tr>
            <td class="id-viaje">
                <?php echo $mostrar['id_viaje'] ?>
            </td>
            <td class="datos">
                <?php echo $mostrar['lugar_origen'] ?>
            </td>
            <td class="datos">
                <?php echo $mostrar['lugar_destino'] ?>
            </td>
            <td class="datos">
                <?php echo $mostrar['fecha'] ?>
            </td>
            <td class="datos">
                <?php echo $mostrar['hora'] ?>
            </td>
            <td class="datos">
                <?php echo $mostrar['precio'] ?>
            </td>
            <td class="datos">
                <?php echo $mostrar['nombre_responsable'] ?>
            </td>
            <td class="datos">
                <?php echo $mostrar['placa'] ?>
            </td>

            <td class="icono"> <a href="../Modelo/editar_viaje.php?id_viaje=<?php echo $mostrar['id_viaje'] ?>"><img
                        class="EditarEliminar" title="Editar bus" src="../../images/editar.png" alt=""></a> </td>
            <td class="icono">
                <a class="eliminarViaje" style="cursor: pointer;" name="<?php echo $mostrar['id_viaje'] ?>">
                    <img class="EditarEliminar" title="Eliminar bus" src="../../images/eliminar.png" alt="">
                </a>
            </td>
        </tr>
        <?php
    }
}
?>