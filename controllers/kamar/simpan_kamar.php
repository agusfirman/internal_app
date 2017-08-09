<?php  
include"../../include/koneksi.php";
$nama_kamar 	= trim($_POST[nama_kamar]);
$sewa 			= trim($_POST[sewa]);
$fasilitas 		= trim($_POST[fasilitas]);
$id = $_POST[id];
if($id =="0"){
$query = "SELECT max(id_room) AS last FROM room ";  
$hasil = mysql_query($query);  
$data  = mysql_fetch_array($hasil);  
$last= $data['last'];  
$ambil_last =  substr($last,1,3);
$nextNoUrut = $ambil_last + 1;
$nextNo = sprintf('%03s', $nextNoUrut); 
$next_kd = "K".$nextNo;
$uploaddir = '../../assets/images/foto/';
$nama_foto  =$_FILES['foto']['name'];

		mysql_query("insert into room set 	id_room  ='$next_kd',
													nama_room ='$nama_kamar',
													sewa_hari    ='$sewa',
													fasilitas='$fasilitas' ");
		echo "Data berhasil disimpan".$next_kd."-".$nama_kamar."-".$sewa_hari;

	}else{
		mysql_query("update room set nama_room ='$nama_kamar',
									sewa_hari    ='$sewa',
									fasilitas='$fasilitas'
									where id_room 	='$id'  ");
		echo "Data berhasil diubah";

	}

//$uploadfile = $uploaddir . basename($_FILES['foto']['name']);

 

	// if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)) {

	//  	mysql_query("insert into room set 	id_room  ='$next_kd',
	// 												nama_room ='$nama_kamar',
	// 												$sewa_hari    ='$sewa',
	// 												fasilitas='$fasilitas',
	// 												foto = '$nama_foto' ");
	// 	echo "Data berhasil disimpan";

	// }else{
	// 	mysql_query("update room set nama_room ='$nama_kamar',
	// 								sewa_hari    ='$sewa',
	// 								fasilitas='$fasilitas',
	// 								foto = '$nama_foto'
	// 								where id 	='$id'  ");
	// 	echo "Data berhasil diubah";

	// }

// $direktori = ".";

// foreach ($_FILES["foto"]["error"] as $key => $error) {

//     if ($error == UPLOAD_ERR_OK) {

//         $tmp_name = $_FILES["foto"]["tmp_name"][$key];

//         $name = $_FILES["foto"]["name"][$key];

//         move_uploaded_file($tmp_name, $direktori."/".$name);

//         echo "File $name berhasil diupload <br>";

//     }

// }
?>