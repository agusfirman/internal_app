<?php
session_start();
$id = $_POST[id];
$username 		= $_SESSION['username'];
$nama_level 	= $_POST[nama_level];
$departemen 	= $_POST[departemen];
$date 			= date('Y-m-d');
if($id =="0"){
		$sql="insert into level_users set nama_level   	='$nama_level',
											departemen    ='$departemen',
											users_create   ='$username',
											create_date  ='$date' ";
	$data =  "Data berhasil disimpan";
}else{
	$sql="update level_users set nama_level   	='$nama_level',
										departemen    ='$departemen',
										users_update   ='$username',
										update_date  ='$date'
										where id_level	='$id'  ";
	$data = "Data berhasil diubah";
}
$mysqli->query($sql);
echo $data;
?>
