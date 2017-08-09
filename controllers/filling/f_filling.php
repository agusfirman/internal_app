<?php 
error_reporting(0);
$id = $_POST[id];
if($id !="0"){
	include"../../include/koneksi.php";
 	$query="select * from m_departemen where id_departemen='$id' ";
 	$query_cari=$mysqli->query($query);
    $cek=mysqli_num_rows($query_cari);
    if($cek){
	    $data_cari = $query_cari->fetch_array();
	    $id_departemen= $data_cari[id_departemen];
	    $nama_departemen= $data_cari[nama_departemen];
    }
}
 ?>
<form class="form-horizontal" id="f_filling" method="post" action="">
		<input type="hidden" class="form-control input-sm span-4" name="id"  value="<?php echo $id; ?>">
	<div class="form-group">
	<label class="col-sm-4 control-label">Nama Departemen</label>
		<div class="col-sm-6">
		<input type="text" class="form-control input-sm" name="nm_dep" value="<?php echo $nama_departemen; ?>">
		</div>
	</div>
</form>