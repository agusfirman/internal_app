<?php 
session_start();
include_once "../../include/koneksi.php";
$username = $_SESSION['username'];
$id_task = $_POST['id_task'];
$result= $mysqli->query("SELECT * FROM sub_task_cat where id_cat='$id_task' ");
$cek  = mysqli_num_rows($result);  
if($cek){
	echo '<select name="spek" class="form-control input-sm spek" >
				<option value="">Silahkan Pilih</option>';
		while($data_cat   = $result->fetch_array()){
			$id_sub_cat =$data_cat[id_sub_cat];
			$nama_sub_cat = $data_cat[nama_sub_cat];   
		echo'<option value="'.$id_sub_cat.'">'.$nama_sub_cat.'</option>';
			}
	echo'</select>';
}else{
	echo'<select name="spek" class="form-control input-sm spek" >
				<option value="">Silahkan Pilih Kategori</option>
				<option value="99">lainya</option>
		</select>
	';
}

?>