
<?php 
	include"../../include/koneksi.php";
$id = $_POST[id];
// if($id !="0"){
//  	$query="select * from file where Nama_Departemen='$nama_departemen' ";
//  	$query_cari=mysql_query($query);
//     $cek=mysql_num_rows($query_cari);
//     if($cek){
// 	    $data_cari = mysql_fetch_array($query_cari);
// 	    $nama_departemen= $data_cari[Nama_Departemen];
//     }
// }
 ?>
<form class="form-horizontal" id="f_ufilling" method="post" action="">
		<input type="hidden" class="form-control input-sm span-4" name="id"  value="<?php echo $id; ?>">
	<div class="form-group">
	<label class="col-sm-4 control-label">Nama Departemen</label>
		<div class="col-sm-6">
		<select name="nama_dep" class="form-control">
  			<option value=""></option>
  			<option value="1">IT</option>
  			<option value="2">DIREKSI</option>
  			<option value="3">KEUANGAN</option>
  			<option value="4">HRD</option>
  			<option value="5">MARKETING</option>
</select>
		</div>
	</div>
	<div class="form-group">
	<label class="col-sm-4 control-label">Nama FIle</label>
		<div class="col-sm-6">
		<input type="text" class="form-control input-sm" name="nama_file" value="<?php echo $nama_departemen; ?>">
		</div>
	</div>
</form>