<?php
include("../Config/conexion.php");

$origen = $_POST['lugar_origen'];
$destino = $_POST['lugar_destino'];
$fecha = $_POST['fecha_viaje'];
$hora = $_POST['hora_salida'];
$placa_bus = $_POST['placa_bus'];
$precio = $_POST['precio_viaje'];

$sql_placa = "SELECT * FROM Transporte WHERE placa='$placa_bus'";

$existe_placa = mysqli_query($conexion, $sql_placa);

if (mysqli_num_rows($existe_placa) === 0) {
    $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/agregar_viaje.php';
    header("Location: " . $return_url . "?success=noexplaca");
    exit();
} else {

    $sql_cruce = "SELECT id_viaje FROM viaje WHERE placa='$placa_bus' and fecha='$fecha'";
    $existe_cruce = mysqli_query($conexion, $sql_cruce);

    if (mysqli_num_rows($existe_cruce) > 0) {
        $sql_hora = "SELECT HOUR(hora) * 60 + MINUTE(hora) AS hora FROM viaje WHERE placa='$placa_bus' and fecha='$fecha'";
        $existe_hora = mysqli_query($conexion, $sql_hora);

        $fila = $existe_hora->fetch_assoc();
        $horaBD = (int) $fila["hora"];

        $tiempo = explode(":", $hora);
        $horaN = ((int) $tiempo[0] * 60) + (int) $tiempo[1];
        
        if (abs($horaBD - $horaN) === 0) {
            $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/agregar_viaje.php';
            header("Location: " . $return_url . "?success=exviaje");
            exit();
        } else if (abs($horaBD - $horaN) < 240) {
            $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/agregar_viaje.php';
            header("Location: " . $return_url . "?success=extiempo");
            exit();
        }
    }


    $sql = "INSERT INTO Viaje(lugar_origen, lugar_destino, fecha, hora, precio, placa) 
    VALUES ('$origen', '$destino', '$fecha', '$hora', '$precio', '$placa_bus')";
    $estado = mysqli_query($conexion, $sql);

    if ($estado) {
        $sql = "SELECT id_viaje FROM viaje ORDER BY id_viaje DESC LIMIT 1;";
        $resultado = mysqli_query($conexion, $sql);

        $fila = mysqli_fetch_assoc($resultado);
        $idViaje = $fila['id_viaje'];

        $filas = 10;
        $columnas = 4;

        $sql = "INSERT INTO asientos(id_viaje, lugar) VALUES";

        echo $sql;

        for ($i = 1; $i <= $filas; $i++) {
            for ($j = 65; $j < 65 + $columnas; $j++) {
                $letra = chr($j); // Convertir el código ASCII a letra
                $estructura[] = $letra . $i;

                $sql .= "('$idViaje', '$letra$i')";
                if ($i == $filas && $j == 68) {
                    $sql .= ';';
                } else {
                    $sql .= ',';
                }

            }
        }

        mysqli_query($conexion, $sql);

        $return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/agregar_viaje.php';
        header("Location: " . $return_url . "?success=true");
        exit();

    }
}

$return_url = isset($_POST['return_url']) ? $_POST['return_url'] : '../Vista/agregar_viaje.php';
header("Location: " . $return_url . "?success=false");
exit();

?>