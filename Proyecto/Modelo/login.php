<?php
include("../Config/conexion.php");
$user = $_POST['user'];
$psw = $_POST['psw'];

$sql = "SELECT * FROM Usuario WHERE correo = '$user'";
$res = mysqli_query($conexion, $sql);
$us = $res->fetch_assoc();

if (mysqli_num_rows($res) == 0) {
    ?>
    <script>alert('Correo o contraseña incorrecta');
    window.location.href = '../../index.html';</script>
    <?php
} else {
    $hashed_contra = $us['psw'];

    if(password_verify($psw, $hashed_contra)) {
        if ($us['ID_CARGO'] == 1) {
            include("../Vista/admin.php");
        } else if ($us['ID_CARGO'] == 2) {
            header("location:../Vista/user.php?value=$user");
        }
    }else {
        ?>
        <script>alert('Correo o contraseña incorrecta');
        window.location.href = '../../index.html';</script>
        <?php
    }
}
?>