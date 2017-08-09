<?php
/*$server = mysql_connect("192.168.3.225","root","");
if(!$server){
 echo "Maaf, tidak dapat sambungan dengan SERVER!!!!";
}
$database = mysql_select_db("db_its_gf");
if(!$database){
 echo "Maaf, tidak dapat sambungan dengan DATABASE!!!!";
}else{
//echo "<script>alert('Dapat Sambungan dengan DATABASE!!!!')</script>";
}*/

$server = "localhost";
$username = "root";
$password = "";
$database = "db_its_gf";
$mysqli = new \mysqli($server, $username, null, $database);
if (\mysqli_connect_errno()) {
 echo"koneksi gagal";
}else{
//echo"koneksi berhasil";
}
date_default_timezone_set("Asia/Jakarta");
$base_url='bromo:8080/internal';
?>
