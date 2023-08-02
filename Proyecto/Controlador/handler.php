<?php
$value = $_GET['value'];
if ($value == 1) {
    include("../Vista/admin.php");
} else if ($value == 2) {
    include("../Vista/user.php");
} else if ($value == 3) {
    include("../Vista/viajes_list.php");
} else if ($value == 4) {
    include("../Vista/reportes.php");
} else if ($value == 5) {
    include("../Vista/reservar_viaje.php");
} else if ($value == 6) {
    include("../Vista/agregar_viaje.php");
} else if ($value == 7) {
    include("../Vista/editar_viaje.php");
} else if ($value == 8) {
    include("../Vista/agregar_bus.php");
} else if ($value == 9) {
    include("../Vista/viajes_list.php");
} else if ($value == 10) {
    include("../Vista/editar_bus.php");
} else if ($value == 11) {
    require("../Vista/buscar_bus.php");
} else if ($value == 12) {
    require("../Vista/buscar_viaje.php");
} else if ($value == 0) {
    require("../../index.html");
} else if ($value == 13) {
    require("../Modelo/reporte1.php");
} else if ($value == 14) {
    require("../Modelo/reporte2.php");
} else if ($value == 15) {
    require("../Modelo/reporte3.php");
} else if ($value == 16) {
    require("../Modelo/reporte4.php");
} else if ($value == 17) {
    require("../Modelo/reporte5.php");
}
?>