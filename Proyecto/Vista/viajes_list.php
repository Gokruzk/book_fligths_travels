<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de viajes</title>
    <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
</head>

<body>
    <a href="../../index.html">Inicio</a>
    <h1>Aquí van la lista de viajes</h1>
    <!-- <fieldset border="1">
        <?php include("../Modelo/mostrar_reservar.php"); ?>
    </fieldset> -->
    <?php
    include('../Modelo/mostrar_viajes.php');
    while ($viaj = $res->fetch_assoc()) {
        ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">
                    <?php $viaj['lugar_destino'] ?>
                </h5>
                <p class="card-text"><?php $viaj['id_viaje'] ?></p>
                <a href="../Modelo/mostrar_reservar.php?id_viaje=$viaj['id_viaje']" class="btn btn-primary">Reservar</a>
            </div>
        </div>
        <?php
    }
    ?>
    <script src="../../JS/bootstrap.min.js"></script>
</body>

</html>