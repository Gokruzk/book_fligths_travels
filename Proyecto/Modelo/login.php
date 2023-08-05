<?php
include("../Config/conexion.php");
$user = $_POST['user'];
$psw = $_POST['psw'];

$sql = "SELECT * FROM Usuario WHERE correo = '$user'";
$res = mysqli_query($conexion, $sql);

$us = $res->fetch_assoc();
$hashed_contra = $us['psw'];

if ((mysqli_num_rows($res) == 0) || (password_verify($psw, $hashed_contra))) {
    ?>
    <script>alert('Correo o contraseña incorrecta');
    window.location.href = '../../index.html';</script>
    <?php
} else {
    if ($us['ID_CARGO'] == 1) {
        include("../Vista/admin.php");
    } else if ($us['ID_CARGO'] == 2) {
        header("location:../Vista/user.php?value=$user");
    }
}
?>
