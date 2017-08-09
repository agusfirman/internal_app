<?php  
include"../../include/koneksi.php";
$nik = trim($_POST[nik]);
$nama = trim($_POST[nama]);
$jkel = trim($_POST[jkel]);
$users = trim($_POST[users]);
$pass_en = base64_encode(trim($_POST[pass]));
$level = $_POST[level];

/*$mysqli->query("insert into users set nik='$nik',
									nama='$nama',
									j_kel='$jkel',
									username='$users',
									password='$pass_en',
									level='$level' ");*/
//echo $nik;
	$sqlcek 	= $mysqli->query("Select * from users where nik='$nik' ");
	$cek 			= mysqli_num_rows($sqlcek);
	// //untuk cek data
	if(!$cek){ 
	  // //jika data tidak tersedia cuy 
		$sql="insert into users set nik='$nik',
												nama='$nama',
												username='$users',
												password='$pass_en',
												level='$level' ";
		$mysqli->query($sql);
			echo "sukses";
	}else{
		$data = $sqlcek->fetch_array();
		echo $data[nama];
	}										
?>