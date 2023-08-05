<?php
include("../Config/conexion.php");

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$contra = sha1($_POST['contra']);
$cargo = $_POST['cargo'];

$consulta = "SELECT * FROM usuario WHERE cedula = '$cedula'";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    echo "ya registrada";
} else {
    $sql = "INSERT INTO usuario (cedula, nombre, apellido, fecha_nacimiento, correo, psw, telefono, ID_CARGO) VALUES('$cedula', '$nombre', '$apellido', '$fechaNacimiento', '$correo', '$contra', '$telefono', '$cargo')";
    $estado = mysqli_query($conexion, $sql);

    if ($estado) {
        echo "exitoso";
    } else {
        echo "error";
    }
}
?>