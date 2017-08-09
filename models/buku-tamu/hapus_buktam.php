<?php
include '../../include/koneksi.php';
$id_undian		= $_POST[id_undian];
$sql 	= $mysqli->query("SELECT * FROM tamu_undangan WHERE no_undian= '$id_undian'");
$row	= mysqli_num_rows($sql);
if ($row){
	$task =$mysqli->query("DELETE FROM tamu_undangan WHERE no_undian= '$id_undian'");
	if($task){
		echo "data berhasil terhapus";
	}
}
?>