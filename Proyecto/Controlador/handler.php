<?php
$value = $_GET['value'];
if ($value == 1) {
    include("../Vista/admin.html");
} else if ($value == 2) {
    include("../Vista/user.html");
} else if ($value == 3) {
    include("../Vista/viajes_list.php");
} else if ($value == 4) {
    include("../Vista/reportes.php");
} else if ($value == 5) {
    include("../Vista/viaje.php");
} else if ($value == 6) {
    include("../Vista/agregar_viaje.html");
} else if ($value == 7) {
    include("../Vista/editar_viaje.php");
} else if ($value == 0) {
    require("../../index.html");
}
?>