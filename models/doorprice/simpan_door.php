
<?php 
	include"../include/koneksi.php";
	$id_door = trim($_POST[id_door]);
	$no_win = trim($_POST[no_win]);
	$cek_data =mysqli_num_rows($mysqli->query("select * from win_doorprize where no_win ='$no_win"));
	if(!$cek_data){
		$mysqli->query("insert into win_doorprize set id_door='$id_door',
											no_win='$no_win' ");
	}else{
		$data = "No undian sudah ada";
	}
	echo $data;
 ?>