<?php
include '../../include/koneksi.php';
$id = $_POST[id];
$sql 	= $mysqli->query("SELECT * FROM trace_resume_medis WHERE id_resume_medis= '$id'");
$row	= mysqli_num_rows($sql);
if ($row){
	$task =$mysqli->query("DELETE FROM trace_resume_medis WHERE id_resume_medis= '$id'");
	if($task){
		echo "data berhasil terhapus";
	}
}
?>
?>