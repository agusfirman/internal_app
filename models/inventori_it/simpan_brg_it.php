<?php
session_start();
include"../../include/koneksi.php";
	$username 		= $_SESSION['username'];
	$id_barang_it 	= $_POST[id_barang_it];
	$nama_barang 	= $_POST[nama_barang];
	$umur_thn 		= $_POST[umur_thn];
	$jumlah 		= $_POST[jumlah];
	$ket 			= $_POST[ket];
	$date 			= date('Y-m-d');

$id = $_POST[id];
if($id =="0"){
	$sql="insert into barang_it set 	nama_barang='$nama_barang',
								umur_thn   ='$umur_thn',
								jumlah    ='$jumlah',
								ket    		='$ket',
								user_create  ='$username',
								date_create 	='$date' ";
	$data =  "Data berhasil disimpan";
}else{
	$sql="update barang_it set 	nama_barang='$nama_barang',
							umur_thn   ='$umur_thn',
							jumlah    ='$jumlah',
							ket    		='$ket',
							user_update  ='$username',
							date_update 	='$date'
							where id_barang_it 	='$id'  ";
	$data = "Data berhasil diubah";
}
$mysqli->query($sql);
echo $sql;
?>
