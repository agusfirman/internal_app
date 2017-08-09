<?php
$base_url   = 'http://localhost/e_tekaje/';
$server = mysql_connect("localhost","root","koperasi71");
if(!$server){
 echo "Maaf, tidak dapat sambungan dengan SERVER!!!!";
}
$database = mysql_select_db("e_tekaje");
if(!$database){
 echo "Maaf, tidak dapat sambungan dengan DATABASE!!!!";
}else{
 //echo "<script>alert('Dapat Sambungan dengan DATABASE!!!!')</script>";
}
date_default_timezone_set("Asia/Jakarta");
?>