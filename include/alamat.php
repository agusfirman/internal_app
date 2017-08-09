<?php 
function alamat(){
	$jadi = "<div id='tjudul' style='font-size:30px;font-weight:normal'>SMK Negeri 1 Kragilan</div><br/>
			<div  style='font-size:12px'>Jl. Raya Serang-Jakarta Km. 13 Perum. Graha Cisait Provinsi Bantenb<br/> Kab. Serang Kec. Kragilan - 42184</div>";
			return $jadi;
}
function tahun_aka(){
	include"koneksi.php";
$queryaka = mysql_query("select * from tahun_akademik where status='1'");
$ambildata = mysql_fetch_array($queryaka);
$tahun_aka = 'Tahun Akademik '.$ambildata['ta_awal'].'-'.$ambildata['ta_akhir'];
return $tahun_aka;
}
function semester(){
	include"koneksi.php";
$queryaka = mysql_query("select * from tahun_akademik where status='1'");
$ambildata = mysql_fetch_array($queryaka);
$semester = 'Semester '.ucwords($ambildata['semester']);
return $semester;
}
?>