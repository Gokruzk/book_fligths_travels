<?php
$user = $_POST['user'];
$psw = $_POST['psw'];
if ($user == 'admin@gmail.com' && $psw == 'admin123') {
    include('../Vista/admin.php');
}
?>