<?php  
session_start();
include"../../include/koneksi.php";
	$username 		= $_SESSION['username'];
	$id_pr 			= $_POST[id_pr];
	$lokasi 		= $_POST[lokasi];
	$lantai 		= $_POST[lantai]; 
	$nama_barang 	= $_POST[nama_barang];  
	$type 			= $_POST[type];   
	$ket 			= $_POST[ket]; 
	$jumlah_pr 		= $_POST[jumlah_pr]; 
	$date 			= date('Y-m-d');

$id = $_POST[id];
if($id =="0"){
	$sql="insert into printer set 	lokasi='$lokasi',
									lantai   ='$lantai',
									type    ='$type',
									id_barang    ='$nama_barang',
									ket    		='$ket',
									jumlah_pr    		='$jumlah_pr',
									user_create  ='$username',
									date_create 	='$date' ";
	$data =  "Data berhasil disimpan";
}else{
	$sql="update printer set 	lokasi='$lokasi',
								lantai   ='$lantai',
								type    ='$type',
								id_barang    ='$nama_barang',
								ket    		='$ket',
								jumlah_pr    		='$jumlah_pr',
								user_update  ='$username',
								date_update 	='$date'
								where id_pr 	='$id'  ";
	$data = "Data berhasil diubah";
}
$mysqli->query($sql);
//echo $sql;
?>






