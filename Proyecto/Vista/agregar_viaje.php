<!DOCTYPE html>
<html lang="en" style="background-color: rgb(50, 42, 80)">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
  if (isset($_GET['success']) && $_GET['success'] === 'true') {
    echo "<script>alert('Se agregó el nuevo viaje correctamente');</script>";
  } else if (isset($_GET['success']) && $_GET['success'] === 'false') {
    echo "<script>alert('No se pudo añadir el nuevo viaje, intente de nuevo');</script>";
  }
  ?>

  <title>Agregar Viaje</title>
</head>

<!-- - Agregar viaje (salida, destino, fecha, asientos disponibles, precio)
  - Editar viaje -->

<body>
  <a href="../../index.html">Inicio</a>

  <a href="../Controlador/handler.php?value=1">Regresar</a>

  <h1>Agregar nuevo viaje</h1>

  <form action="../Modelo/insertar_viaje.php" method="post">
    <label for="">Lugar de origen</label>

    <input type="text" placeholder="origen" name="lugar_origen"></input>

    <label for="">Lugar de destino</label>

    <input type="text" placeholder="destino" name="lugar_destino"></input>

    <label for="">Fecha del viaje</label>

    <input type="date" name="fecha_viaje"></input>

    <label for="">Hora de salida</label>

    <input type="time" name="hora_salida"></input>


    <label for="">Código bus asignado</label>
    <input type="text" placeholder="bus" name="codigo_bus"></input>

    <label for="">Precio</label>

    <input type="text" pattern="^([$]{1})[1-9]{1}[0,9]{0,}|^([$]{1})[1-9]{1}[0,9]{0,}[.][0-9]{1,2}" placeholder="$0.00"
      onfocus="if(this.value=='') this.value='$';" name="precio_viaje"></input>

    <button type="submit">Agregar</button>
  </form>
</body>

</html>