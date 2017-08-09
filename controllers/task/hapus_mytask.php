<?php
include '../../include/koneksi.php';
$id_task		= $_POST[id_task];
$sql 	= $mysqli->query("SELECT * FROM task WHERE id_task= '$id_task'");
$row	= mysqli_num_rows($sql);
if ($row){
	$task =$mysqli->query("DELETE FROM task WHERE id_task= '$id_task'");
	if($task){
		echo "data berhasil terhapus";
	}
}
?>