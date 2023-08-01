<?php
include("../Config/conexion.php");
$sql = "SELECT *
FROM Viaje v
inner join Transporte T
on V.placa = T.placa ";

$resultado = mysqli_query($conexion, $sql);

while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>
    <tr>
        <td class="datos">
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

        <td class="icono"> <a href="../Modelo/editar_viaje.php?id_viaje=<?php echo $mostrar['id_viaje'] ?>"><img class="EditarEliminar" title="Editar bus"
                    src="../../images/editar.png" alt=""></a> </td>
        <td class="icono"> <a href="../Modelo/eliminar_viaje.php?id_viaje=<?php echo $mostrar['id_viaje'] ?>"><img class="EditarEliminar" title="Eliminar bus"
                    src="../../images/eliminar.png" alt=""></a> </td>

    </tr>
    <?php
}
?>