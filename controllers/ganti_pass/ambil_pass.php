<?php 
session_start();
include_once "../../include/koneksi.php";
$username = $_SESSION['username'];
$pass_lama = base64_encode($_POST['pass_lama']);
$sql = $mysqli->query("select * from users where username = '$username' and password = '$pass_lama' ");
$cocok = mysqli_num_rows($sql);
echo $cocok;
?>