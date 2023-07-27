<?php
include("../Config/conexion.php");
$sql = "SELECT v.id_viaje, v.lugar_origen, v.lugar_destino, v.fecha, v.hora, v.precio, b.nombre_responsable 
FROM Viaje v
inner join Bus b
on v.id_bus = b.id_bus ";

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

        <td> <a href="../Modelo/eliminar_viaje.php?id_viaje=<?php echo $mostrar['id_viaje'] ?>">Eliminar</a> </td>
        <td> <a href="../Modelo/editar_viaje.php?id_viaje=<?php echo $mostrar['id_viaje'] ?>">Editar</a> </td>

    </tr>
    <?php
}
?>