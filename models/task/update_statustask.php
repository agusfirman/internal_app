<?php
 if (!isset($_SESSION)) {
    session_start();
  }
  include"../../include/koneksi.php";
$username = $_SESSION['username'];
$id_task 	= $_POST[id_task];
$status 	= $_POST[status];
//$solv 		= $_POST[solv];
		$sql = "update task set st_task = '$status',
														users_finished='$username'
														where id_task='$id_task' ";
  if ($mysqli->query($sql) === TRUE) {
     $pesan= "Data berhasil diperbaharui.";
    } else {
     $pesan =  "Error memperbaharui data: " . $mysqli->error;
    }
		//$pesan = "Data berhasil diubah".$id_task."-".$status;
//echo $username.'-'.$id_task.'-'.$status;
echo $pesan;
?>
