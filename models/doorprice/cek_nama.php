
<?php 
	include"../include/koneksi.php";
	$id_door = trim($_POST[id_door]);
	$query = $mysqli->query("select * from win_doorprize where id_door='$id_door' ");
	$cek_data = mysqli_num_rows($query);
	if($cek_data){
		$q_sisa = $mysqli->query("SELECT
								doorprize.qty - COUNT(id_door) as hasil
								FROM
								doorprize inner join win_doorprize 
								where doorprize.id=win_doorprize.id_door AND doorprize.id='$id_door' ");
		$t_sisa = $q_sisa->fetch_array();
		$data_sisa = $t_sisa[hasil];
		if($data_sisa <=0){
			$data = "Barang sudah habis diundi, silahkan pilih yang lain";
		}else{
			$data = "Data masih tersedia ".$data_sisa." lagi";
		}
	}else{
		$data="Silahkan acak no undianya..!";
	}
	echo $data;
 ?>