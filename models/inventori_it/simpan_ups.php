<?php
session_start();
include"../../include/koneksi.php";
	$username 		= $_SESSION['username'];
	$id_ups 		= $_POST[id_ups];
	$jumlah 		= $_POST[jumlah];
	$lokasi 		= $_POST[lokasi];
	$lantai 		= $_POST[lantai];
	$merk 			= $_POST[merk];
	$type 			= $_POST[type];
	$ket 			= $_POST[ket];
	$date 			= date('Y-m-d');

$id = $_POST[id];
if($id =="0"){
	$sql="insert into ups set 	lokasi='$lokasi',
										lantai   ='$lantai',
										merk   	='$merk',
										type    ='$type',
										jumlah    ='$jumlah',
										ket    		='$ket',
										user_create  ='$username',
										date_create 	='$date' ";
	$data =  "Data berhasil disimpan";
}else{
	$sql="update ups set lokasi='$lokasi',
								lantai   ='$lantai',
								merk   	='$merk',
								type    ='$type',
								jumlah    ='$jumlah',
								ket    		='$ket',
								user_update  ='$username',
								date_update 	='$date'
								where id_ups 	='$id'  ";
	$data = "Data berhasil diubah";
}
$mysqli->query($sql);
echo $sql;
?>
