<?php
$base_url   = 'http://localhost/e_learning_v2/';
$server = mysql_connect("mysql.idhostinger.com","u690844735_abon","aL05WEETS0bvw");
if(!$server){
 echo "Maaf, tidak dapat sambungan dengan SERVER!!!!";
}
$database = mysql_select_db("u690844735_dbtkj");
if(!$database){
 echo "Maaf, tidak dapat sambungan dengan DATABASE!!!!";
}else{
//echo "<script>alert('Dapat Sambungan dengan DATABASE!!!!')</script>";
}
date_default_timezone_set("Asia/Jakarta");
//untuk otomatis mengeluarkan user yang lupa keluar
//include"auto_logout.lib.php";
?>