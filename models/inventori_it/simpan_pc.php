<?php
session_start();
include"../../include/koneksi.php";
	$username 		= $_SESSION['username'];
	$id_pc 			= $_POST[id_pc];
	$ip_address 	= $_POST[ip_address];
	$hostname 		= $_POST[hostname];
	$lokasi 		= $_POST[lokasi];
	$lantai 		= $_POST[lantai];
	$merk 			= $_POST[merk];
	$type 			= $_POST[type];
	$ket 			= $_POST[ket];
	$date 			= date('Y-m-d');

$id = $_POST[id];
if($id =="0"){
	$sql="insert into p_computer set 	lokasi='$lokasi',
										ip_address    ='$ip_address',
										hostname   ='$hostname',
										lantai   ='$lantai',
										merk   	='$merk',
										type    ='$type',
										ket    		='$ket',
										user_create  ='$username',
										date_create 	='$date' ";
	$data =  "Data berhasil disimpan";
}else{
	$sql="update p_computer set lokasi='$lokasi',
								ip_address    ='$ip_address',
								hostname    ='$hostname',
								lantai   ='$lantai',
								merk   	='$merk',
								type    ='$type',
								ket    		='$ket',
								user_update  ='$username',
								date_update 	='$date'
								where id_pc 	='$id'  ";
	$data = "Data berhasil diubah";
}
$mysqli->query($sql);
//echo $sql;
?>
