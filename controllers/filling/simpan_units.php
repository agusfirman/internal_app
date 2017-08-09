<?php  
include"../../include/koneksi.php";
$id_departemen 	= trim($_POST[id_departemen]);
$nama_unit = $_POST[nama_unit];
$deskripsi = $_POST[deskripsi];
$id =  $_POST[id];
if($id =="0"){
		$mysqli->query("insert into m_units set id_departemen ='$id_departemen',
												nama_unit = '$nama_unit',
												deskripsi = '$deskripsi'
												");
	$pesan = "Data berhasil disimpan";

}else{
	$mysqli->query("update m_units set id_departemen ='$id_departemen',
												nama_unit = '$nama_unit',
												deskripsi = '$deskripsi'
												where id_unit	='$id'  ");
	$pesan = "Data berhasil diubah";

}
echo $pesan;
?>