<?php 
include_once "../include/koneksi.php";
session_start();
if(isset($_SESSION[username])){	
		$username 				= $_SESSION[username];
		$pass_baru					= base64_encode($_POST[pass_baru]);
		// echo $pass_baru;
		// echo "OK";
		$cek_data = mysql_num_rows(mysql_query("select * from users where username='$username'  "));
		if($cek_data){
		mysql_query("update users set password ='$pass_baru' where username='$username' ");
		echo "<script>alert('Password Berhasil Diubah');document.location.href='../index.php'</script>";
		}
}
?>