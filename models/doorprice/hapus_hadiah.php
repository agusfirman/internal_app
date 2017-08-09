<?php
include '../../include/koneksi.php';
$id_hadiah		= $_POST[id_hadiah];
$sql 	= $mysqli->query("SELECT * FROM doorprize WHERE id= '$id_hadiah'");
$row	= mysqli_num_rows($sql);
if ($row){
	$task =$mysqli->query("DELETE FROM doorprize WHERE id= '$id_hadiah'");
	if($task){
		echo "data berhasil terhapus";
	}
}
?>