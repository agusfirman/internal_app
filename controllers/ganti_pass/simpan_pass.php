<?php 
include_once "../../include/koneksi.php";
session_start();
if(isset($_SESSION[username])){	
		$username 				= $_SESSION[username];
		$pass_baru					= base64_encode($_POST[pass_baru]);
		// echo $pass_baru;
		// echo "OK";
		$cek_data = mysqli_num_rows($mysqli->query("select * from users where username='$username'  "));
		if($cek_data){
		$mysqli->query("update users set password ='$pass_baru' where username='$username' ");
		echo "<script>alert('Password Berhasil Diubah');document.location.href='../../index.php'</script>";
		}
}
?>