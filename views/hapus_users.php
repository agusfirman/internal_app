<?php
include '../include/koneksi.php';
$id		= $_POST['id'];
$sql 	= mysql_query("SELECT * FROM users WHERE username= '$id'");
$row	= mysql_num_rows($sql);
if ($row>0){
	$users = "DELETE FROM users WHERE username= '$id'";
	mysql_query($users);
}
?>