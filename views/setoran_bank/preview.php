<?php 
//include("../include/terbilang-class.php");

$nama 				=$_POST[nama];
$norek 				=$_POST[norek];
$nama_dokter_tampil =$_POST[nama_dokter_tampil];
$nama_penyetor 		=$_POST[nama_penyetor];
$alm_penyetor 		=$_POST[alm_penyetor];
$telp 				=$_POST[telp];
$nominal 			=$_POST[nominal];
$nominal_hidden		=$_POST[nominal_hidden];
//$terbilang = terbilang(intval($nominal)); 

$data = array();
$data['nama'] 					= $nama;
$data['norek'] 					= $norek;
$data['nama_dokter_tampil'] 	= $nama_dokter_tampil;
$data['nama_penyetor'] 			= $nama_penyetor;
$data['alm_penyetor'] 			= $alm_penyetor;
$data['telp'] 					= $nama_dokter_tampil;
$data['nominal'] 				= $nominal;
$data['nominal_hidden'] 		= $nominal_hidden;

echo json_encode($data);

 ?>