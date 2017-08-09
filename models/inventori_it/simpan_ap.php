<?php
session_start();
include"../../include/koneksi.php";
$username 	= $_SESSION['username'];
$ssid 		= $_POST[ssid];
$ip_address = $_POST[ip_address];
$lantai 	= $_POST[lantai];
$lokasi 	= $_POST[lokasi];
$ket 		= $_POST[ket];
$date = date('Y-m-d');

$id = $_POST[id];
if($id =="0"){
$query = "SELECT max(id_task) AS last FROM task ";
$hasil = $mysqli->query($query);
$data  = $hasil->fetch_array();
$last= $data['last'];
$ambil_last =  substr($last,1,3);
$nextNoUrut = $ambil_last + 1;
$nextNo = $today.sprintf('%03s', $nextNoUrut);
$next_kd = "T".$nextNo;
		$sql="insert into access_point set 	ssid   	='$ssid',
									ip_address    ='$ip_address',
									lantai   ='$lantai',
									lokasi='$lokasi',
									ket    		='$ket',
									user_create  ='$username',
									date_create 	='$date' ";
	$data =  "Data berhasil disimpan";
}else{
	$sql="update access_point set 	ssid   	='$ssid',
									ip_address    ='$ip_address',
									lantai   ='$lantai',
									lokasi='$lokasi',
									ket    		='$ket',
									user_update  ='$username',
									date_update 	='$date'
									where id_ap 	='$id'  ";
	$data = "Data berhasil diubah";
}
$mysqli->query($sql);
//echo $sql;
?>
