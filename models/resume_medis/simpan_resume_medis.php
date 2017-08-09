<?php
session_start();
include"../../include/koneksi.php";
$username = $_SESSION['username'];
$rekam_medis 	= $_POST[rekam_medis];
$nama_pasien 	= $_POST[nama_pasien];
$keterangan 	= $_POST[ket];
$date_req = date('Y-m-d');

$id = $_POST[id];
if($id ==0){
		$sql="insert into trace_resume_medis set 	rekam_medis		='$rekam_medis',
													nama_pasien   	='$nama_pasien',
													users_req    ='$username',
													date_req   ='$date_req',
													keterangan ='$keterangan' ";
	$data =  "Data berhasil disimpan";
}else{
	$sql="update trace_resume_medis set 	rekam_medis='$rekam_medis',
											nama_pasien   	='$nama_pasien',
											keterangan ='$keterangan'
											where id_resume_medis='$id'  ";
	$data = "Data berhasil diubah";
}
$mysqli->query($sql);
echo $sql;
?>
