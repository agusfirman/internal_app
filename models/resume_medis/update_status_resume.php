<?php
session_start();
$username = $_SESSION['username'];
include"../../include/koneksi.php";
$id_resume_medis 	= $_POST[id_resume_medis];
$status 	= $_POST[status];
$date_confirm = date('Y-m-d');
		$mysqli->query("update trace_resume_medis set status = '$status',users_confirm='$username', date_confirm='$date_confirm' where id_resume_medis='$id_resume_medis' ");
		$data = "Data berhasil diubah ".$id_resume_medis."-".$status."-".$username;
echo $data;
?>
