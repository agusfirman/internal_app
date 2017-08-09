<?php
include '../../include/koneksi.php';
$id		= $_POST['id'];
$sql 	= $mysqli->query("SELECT * FROM level_users WHERE id_level= '$id'");
$row	= mysqli_num_rows($sql);
if ($row>0){
	$sql = "update level_users set isdelete='1' WHERE id_level= '$id'";
	$mysqli->real_query($sql);

}
?>