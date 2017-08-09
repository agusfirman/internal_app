<?php
session_start();
$username = $_SESSION['username'];
$id_task_cat 	= $_POST[cat_id];
$nama_task_cat 	= $_POST[nama_task_cat];
if(isset($username)){
$query = "SELECT id_task_cat FROM task_cat where id_task_cat='$id_task_cat' ";
$hasil = $mysqli->query($query);
	$cek  = mysqli_num_rows($hasil);
	if(!$cek){
		$mysqli->query("insert into task_cat set 	id_task_cat	='$id_task_cat',
																							nama_task_cat   	='$nama_task_cat',
											 												users_create = '$username'");
		$data =  "Data berhasil disimpan";
	}else{
		$mysqli->query("update task_cat set nama_task_cat   	='$nama_task_cat'
									where id_task_cat	='$id_task_cat' ");
	$data = "Data berhasil diubah";
	}
echo $data;
}else{
echo'<script>alert("Silahkan Login Kembali")</script>';
}
?>
