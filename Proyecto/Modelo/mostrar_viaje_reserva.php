<?php
include("../Config/conexion.php");

$id_viaje = $_GET['id_viaje'] ?? '';

$sql = "SELECT v.id_viaje, v.lugar_origen, v.lugar_destino, v.fecha, v.hora, v.precio, b.nombre_responsable 
        FROM viaje V
        inner join bus B
        on V.id_bus = B.id_bus
        where v.id_viaje = $id_viaje";
        

$resultado = mysqli_query($conexion, $sql);

while ($mostrar = mysqli_fetch_array($resultado)) {
?>
<fieldset>
    <br>
    <?php echo "Lugar de Partida:" ?>
    <?php echo $mostrar['lugar_origen'] ?>
    <br>
    <?php echo "Lugar de Destino:" ?>
    <?php echo $mostrar['lugar_destino'] ?>
    <br>
    <?php echo "Fecha:" ?>
    <?php echo $mostrar['fecha'] ?>
    <br>
    <?php echo "Hora:" ?>
    <?php echo $mostrar['hora'] ?>
    <br>
    <?php echo "Precio por persona:" ?>
    <?php echo $mostrar['precio'] ?>
    <br>
</fieldset>
<?php
}
?>