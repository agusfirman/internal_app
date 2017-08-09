<?php
include '../../include/koneksi.php';
$id		= $_POST[id];
$sql 	= $mysqli->query("SELECT * FROM dt_dokter WHERE id= '$id'");
$row	= mysqli_num_rows($sql);
if ($row){
	$users =$mysqli->query("DELETE FROM dt_dokter WHERE id= '$id'");
	if($users){
		echo "data berhasil terhapus";
	}
}
?>