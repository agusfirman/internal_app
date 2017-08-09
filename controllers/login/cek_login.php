<?php
	 if (!isset($_SESSION)) {
    session_start();
	}
include"../../include/koneksi.php";
// //mengambil data dari form login
$username=$_POST['username'];
$code = "base64_encode";
$password= $code($_POST['password']);
	//login ke tabel users
	$sql ="select * from users where username='$username' and password='$password'";
	$queryUsers=$mysqli->query($sql);
	$cekUsers=mysqli_num_rows($queryUsers);
	if($cekUsers){
		$data= $queryUsers->fetch_array();
		$_SESSION['username']=$username;
		$_SESSION['level'] = $data['level'];
		$_SESSION['jkel'] = $data['j_kel']; 
		//header('location:../index.php');
	echo"sukses";
	}else{
	echo"Username dan Password Tidak Ditemukan";
	}
?>