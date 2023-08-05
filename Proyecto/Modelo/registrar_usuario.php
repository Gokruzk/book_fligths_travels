<?php
include("../Config/conexion.php");

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$contra = $_POST['contra'];
$cargo = $_POST['cargo'];

$hashed_contra = password_hash($contra, PASSWORD_DEFAULT);

$consulta = "SELECT * FROM usuario WHERE cedula = '$cedula'";
$resultado = mysqli_query($conexion, $consulta);

$correoConsul = $resultado->fetch_assoc();

if ((mysqli_num_rows($resultado) > 0) || ($correoConsul['correo'] == $correo)) {
    echo "ya registrada";
} else {
    $sql = "INSERT INTO usuario (cedula, nombre, apellido, fecha_nacimiento, correo, psw, telefono, ID_CARGO) VALUES('$cedula', '$nombre', '$apellido', '$fechaNacimiento', '$correo', '$hashed_contra', '$telefono', '$cargo')";
    $estado = mysqli_query($conexion, $sql);

    if ($estado) {
        echo "exitoso";
    } else {
        echo "error";
    }
}