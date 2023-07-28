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
        <td>
            <?php echo $mostrar['id_viaje'] ?>
        </td>
        <td>
            <?php echo $mostrar['lugar_origen'] ?>
        </td>
        <td>
            <?php echo $mostrar['lugar_destino'] ?>
        </td>
        <td>
            <?php echo $mostrar['fecha'] ?>
        </td>
        <td>
            <?php echo $mostrar['hora'] ?>
        </td>
        <td>
            <?php echo $mostrar['precio'] ?>
        </td>
        <td>
            <?php echo $mostrar['nombre_responsable'] ?>
        </td>
        <td>
            <?php echo $mostrar['placa'] ?>
        </td>

        <td> <a href="../Modelo/eliminar_viaje.php?id_viaje=<?php echo $mostrar['id_viaje'] ?>">Eliminar</a> </td>
        <td> <a href="../Modelo/editar_viaje.php?id_viaje=<?php echo $mostrar['id_viaje'] ?>">Editar</a> </td>

    </tr>
    <?php
}
?>