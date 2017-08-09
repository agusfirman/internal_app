<?php  
include"../../include/koneksi.php";
$nama_dokter 	= trim($_POST[nama_dokter]);
$nama_bank 		= trim($_POST[nama_bank]);
$norek 	= trim($_POST[norek]);
if($nama_bank ==1){
	$nm_bank = "norek_bca";
}else if($nama_bank ==2){
	$nm_bank = "norek_cimb";
}else if($nama_bank ==3){
	$nm_bank = "norek_mandiri";
}

$id = $_POST[id];
if($id =="0"){
$query = "SELECT max(id) AS last FROM dt_dokter ";  
$hasil = $mysqli->query($query);  
$data  = $hasil->fetch_array();  
$last= $data['last'];  
$ambil_last =  substr($last,1,3);
$nextNoUrut = $ambil_last + 1;
$nextNo = sprintf('%03s', $nextNoUrut); 
$next_kd = "D".$nextNo;
		$mysqli->query("insert into dt_dokter set 	id          ='$next_kd',
												nama_dokter ='$nama_dokter',
												$nm_bank    ='$norek' ");
	echo "Data berhasil disimpan";

}else{
	$mysqli->query("update dt_dokter set nama_dokter 	='$nama_dokter',
										$nm_bank    ='$norek'
										where id 	='$id'  ");
	echo "Data berhasil diubah";

}
?>