<?php
session_start();
$username = $_SESSION['username'];
$sub_cat_id 	= $_POST[sub_cat_id];
$id_cat_task 	= $_POST[id_cat_task];
$nama_sub_cat 	= $_POST[nama_sub_cat];
$deskripsi 	= $_POST[deskripsi];
$query = "SELECT * FROM sub_task_cat where 	id_sub_cat='$sub_cat_id' ";
$hasil = $mysqli->query($query);
	$cek  = mysqli_num_rows($hasil);
	if(!$cek){
		$mysql->query("insert into sub_task_cat set 	id_sub_cat	='$sub_cat_id',
													id_cat = '$id_cat_task',
													nama_sub_cat = '$nama_sub_cat',
													deskripsi = '$deskripsi' ");
	$data =  "Data berhasil disimpan";
	}else{
		$mysql->query("update sub_task_cat set id_cat = '$id_cat_task',
										nama_sub_cat = '$nama_sub_cat',
										deskripsi = '$deskripsi'
										where id_sub_cat='$sub_cat_id' ");
	$data = "Data berhasil diubah";
	}
echo $data;
?>
