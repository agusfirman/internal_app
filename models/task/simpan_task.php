<?php
session_start();
include"../../include/koneksi.php";
$username = $_SESSION['username'];
$subject 	= $_POST[subject];
$task_cat = $_POST[task_cat];
$spek 		= $_POST[spek];
$_case 		= trim($_POST[_case]);
$nm_pel 	= $_POST[nm_pel];
$bagian 	= $_POST[bagian];
$ext 			= $_POST[ext];
$tgl_post = date('Y-m-d');

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
		$sql="insert into task set 	id_task		='$next_kd',
																subject   	='$subject',
																task_cat    ='$task_cat',
																task_desc   ='$spek',
																users_create  ='$username',
																users_claims='$nm_pel',
																users_dept='$bagian',
																ext='$ext',
																_case    		='$_case',
																tgl_post 	='$tgl_post' ";
	$data =  "Data berhasil disimpan";
}else{
	$sql="update task set 	subject   	='$subject',
													users_claims='$nm_pel',
													users_dept='$bagian',
													ext='$ext',
													_case ='$_case'
													where id_task 	='$id'  ";
	$data = "Data berhasil diubah";
}
$mysqli->query($sql);
//echo $sql;
?>
