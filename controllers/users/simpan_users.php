<?php  
include"../../include/koneksi.php";
$nik = trim($_POST[nik]);
$nama = trim($_POST[nama]);
$jkel = trim($_POST[jkel]);
$usersname = trim($_POST[usersname]);
$pass = trim($_POST[pass]);
$pass_en = base64_encode($pass);
$level = $_POST[level];
$id = $_POST[id];
if($id =="0"){
	$sqlcek 	= $mysqli->query("Select * from users where nik='$nik' ");
	$cek 			= mysqli_num_rows($sqlcek);
	// //untuk cek data
	if(!$cek){ 
	  // //jika data tidak tersedia cuy 
		$mysqli->query("insert into users set nik='$nik',
										nama='$nama',
										j_kel='$jkel',
										username='$usersname',
										password='$pass_en',
										level='$level' ");
		echo"Data berhasil disimpan";
		}else{
			echo"Data gagal disimpan";
		}
	}else{
		$mysqli->query("update users set nik='$nik',
							nama='$nama',
							j_kel='$jkel',
							password='$pass_en',
							level='$level' where 
							username='$id' ");
		echo"Data berhasil diubah";
	}	

?>