<?php
session_start();
$username = $_SESSION['username'];
include"../../include/koneksi.php";
$nama_undangan 	= $_POST[nama_undangan];
$tgl_post = date('Y-m-d');
$id = $_POST[id_undangan];
$departement = $_POST[departement];
$deskripsi	 = $_POST[deskripsi];
if($id =="0"){
/*$query = "SELECT max(no_undian) AS last FROM tamu_undangan ";
$hasil = $mysqli->query($query);
$data  = $hasil->fetch_array();
$last= $data['last'];
$nextNoUrut = $last + 1;*/
$mysqli->query("insert into tamu_undangan set nama='$nama_undangan',
											  departement = '$departement',
											  deskripsi = '$deskripsi' ");
		$data =  "Data disimpan ";
	}else{
$mysqli->query("update tamu_undangan set 	nama='$nama_undangan',
												departement = '$departement',
											  	deskripsi = '$deskripsi' where no_undian='$id' ");
		$data =  "Data diubah ";
	}
echo $data;
?>
