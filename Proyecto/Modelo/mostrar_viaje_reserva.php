<?php
include("../Config/conexion.php");

$id_viaje = $_GET['id_viaje'] ?? '';

$sql = "SELECT v.id_viaje, v.lugar_origen, v.lugar_destino, v.fecha, v.hora, v.precio, b.nombre_responsable 
        FROM Viaje v
        inner join Transporte b
        on v.placa = b.placa
        where v.id_viaje = $id_viaje";


$resultado = mysqli_query($conexion, $sql);

while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>
    <fieldset>
        <br>
        <h5 class="info1">
            <?php echo "Lugar de Partida:" ?>
            </h4>
            <h6 class="info2">
                <?php echo $mostrar['lugar_origen'] ?>
            </h6>

            <h5 class="info1">
                <?php echo "Lugar de Destino:" ?>
            </h5>
            <h6 class="info2">
                <?php echo $mostrar['lugar_destino'] ?>
            </h6>

            <h5 class="info1">
                <?php echo "Fecha de salida:" ?>
            </h5>
            <h6 class="info2">
                <?php echo $mostrar['fecha'] ?>
            </h6>
            
            <h5 class="info1">
                <?php echo "Hora de salida:" ?>
            </h5>
            <h6 class="info2">
                <?php echo $mostrar['hora'] ?>
            </h6>

            <h5 class="info1">
                <?php echo "Precio por persona: " ?>
            </h5>

            <h6 class="info2">
            <?php  echo $mostrar['precio']?>
            </h6>
    </fieldset>
    <?php
}
?>