<?php
include("../Config/conexion.php");
$user = $_POST['user'];
$psw = $_POST['psw'];
$sql = "SELECT * FROM Usuario WHERE correo = '$user' AND psw = '$psw'";
$res = mysqli_query($conexion, $sql);
$us = $res->fetch_assoc();

if ($us['ID_CARGO'] == 1) {
    include("../Vista/admin.php");
} else if ($us['ID_CARGO'] == 2) {
    header("location:../Vista/user.php?value=$user");
}
?>