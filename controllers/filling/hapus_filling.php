<?php
include '../../include/koneksi.php';
$id_departemen		= $_POST[id];
$sql 	= $mysqli->query("SELECT * FROM m_departemen WHERE id_departemen= '$id_departemen'");
$row	= mysqli_num_rows($sql);
if ($row){
	$task =$mysqli->query("DELETE FROM m_departemen WHERE id_departemen= '$id_departemen'");
	if($task){
		echo "data berhasil terhapus";
	}
}
?>