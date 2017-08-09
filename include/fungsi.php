<?php
include"koneksi.php";
$queryaka = mysql_query("select * from tahun_akademik where status='1'");
$ambildata = mysql_fetch_array($queryaka);
$tahun_aka = $ambildata['ta_awal'].'-'.$ambildata['ta_akhir'];
$tahun_aka_id = $ambildata['id_ta'];
$semester = $ambildata['semester'];

?>