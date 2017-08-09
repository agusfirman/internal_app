<?php
include '../../include/koneksi.php';
$id_task_cat		= $_POST[id_task_cat];
$sql 	= $mysql->query("SELECT * FROM task_cat WHERE id_task_cat= '$id_task_cat'");
$row	= mysqli_num_rows($sql);
if ($row){
	$task =$mysql->query("DELETE FROM task_cat WHERE id_task_cat= '$id_task_cat'");
	if($task){
		echo "data berhasil terhapus";
	}
}
?>
