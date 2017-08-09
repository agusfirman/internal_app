<?php
session_start();
$username = $_SESSION['username'];
include"../../include/koneksi.php";
$nama_hadiah 	= $_POST[nama_hadiah];
$jml_hadiah =$_POST[jml_hadiah];
$id = $_POST[id_hadiah];
if($id =="0"){
$mysqli->query("insert into doorprize set 	nama='$nama_hadiah',
											qty='$jml_hadiah' ");
		$data =  "Data disimpan ".$nama;
	}else{
$mysqli->query("update doorprize set 	nama='$nama_hadiah',
										qty='$jml_hadiah' where id='$id' ");
		$data =  "Data diubah ";
	}
echo $data;
?>
