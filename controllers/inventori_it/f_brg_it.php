<?php 
$id = $_POST[id];
include"../../include/koneksi.php";
if($id !='0'){
 	$query=$mysqli->query("SELECT * from barang_it where id_barang_it='$id' ");
	$data_edit  = $query->fetch_array();   
	$cek  = mysqli_num_rows($query);  
	if($cek){
		$id 			= $id;
		$id_barang_it 	= $data_edit[id_barang_it];
		$jumlah 		= $data_edit[jumlah];
		$nama_barang 	= $data_edit[nama_barang];
		$umur_thn 		= $data_edit[umur_thn];   
		$ket 			= $data_edit[ket];    
	}
}
 ?>

<form id="f_brg_it" class="form-horizontal" action="" method="post">
  <div class="form-group">
	<input type="hidden" class="form-control input-sm" name="id"  value="<?php echo $id; ?>">
	<label class="col-sm-3 control-label">Nama Barang</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control input-sm" name="nama_barang" value="<?php echo $nama_barang; ?>">
		</div>
  </div>
  <div class="form-group">
		<label class="col-sm-3 control-label">umur_thn</label>
		<div class="col-sm-4">
			<select name="umur_thn" id="umur_thn" class="form-control input-sm" >
			<?php 
				echo '
				<option value="'.$umur_thn.'">'.$umur_thn.'</option>';
			 ?> 
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
		</div>
  </div>
  <div class="form-group">
		<label class="col-sm-3 control-label">Jumlah</label>
		<div class="col-sm-4">
		  <input type="text" class="form-control input-sm" name="jumlah" value="<?php echo $jumlah; ?>">
		</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Keterangan</label>
		<div class="col-sm-8">
			<textarea name="ket" class="form-control input-sm" cols="30" rows="3">
				<?php echo $ket; ?>
			</textarea>
		</div>
  </div>
</form>