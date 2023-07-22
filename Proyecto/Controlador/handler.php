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
} else if ($value == 5){
    include("../Vista/viaje.php");
}
?>