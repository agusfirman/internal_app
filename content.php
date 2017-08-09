<?php
if (!isset($_SESSION)) {
session_start();
}
$username =$_SESSION['username'];
if(isset($username)){
	include"include/koneksi.php";
	$pages_dir = 'views/';
				if(!empty($_GET['page'])){
					$pages = scandir($pages_dir, 0);
					unset($pages[0], $pages[1]);
		 
					$p = base64_decode($_GET['page']);
					// $pecah = explode($key,$p);
					// $p2 = $pecah[0];
					if(in_array($p.'.php', $pages)){
						include($pages_dir.'/'.$p.'.php');
					} else {
						echo "Not Found";
					}
				} else {
					include($pages_dir.'/home.php');
				}
				
}else{
	echo"<script>alert('anda belum login');</script>";
}
?>