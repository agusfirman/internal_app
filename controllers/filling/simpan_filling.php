<?php  
include"../../include/koneksi.php";
$nama_departemen 	= trim($_POST[nm_dep]);
$id = $_POST[id];
if($id =="0"){
		$mysqli->query("insert into m_departemen set
												nama_departemen ='$nama_departemen'
												");
	echo "Data berhasil disimpan";

}else{
	$mysqli->query("update m_departemen set nama_departemen 	='$nama_departemen'
										
										where id_departemen	='$id'  ");
	echo "Data berhasil diubah";

}
?>