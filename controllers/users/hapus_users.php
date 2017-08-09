<?php
include '../../include/koneksi.php';
$id		= $_POST['id'];
$sql 	= $mysqli->query("SELECT * FROM users WHERE username= '$id'");
$row	= mysqli_num_rows($sql);
if ($row>0){
	$users = "DELETE FROM users WHERE username= '$id'";
	$mysqli->query($users);
}
?>