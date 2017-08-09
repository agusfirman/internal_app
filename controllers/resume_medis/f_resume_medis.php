<?php 
$id_resume_medis = $_POST[id_resume_medis];
	include"../../include/koneksi.php";
if($id_resume_medis !='0'){
	$query = "SELECT * FROM trace_resume_medis where id_resume_medis='$id_resume_medis' ";  
	$hasil = $mysqli->query($query);
	$data  = $hasil->fetch_array();   
	$cek  = mysqli_num_rows($hasil);  
	if($cek){
		$id_resume_medis = $id_resume_medis;
		$rekam_medis = $data[rekam_medis];
		$nama_pasien = $data[nama_pasien];
		$ket = $data[keterangan];
	}
}
 ?>

<form id="f_resume_medis" class="form-horizontal" action="" method="post">
  <div class="form-group">
	<label class="col-sm-3 control-label">Rekam Medis</label>
		<div class="col-sm-2">
		  <input type="hidden" class="form-control input-sm" name="id"  readonly value="<?php echo $id_resume_medis; ?>">
		  <input type="text" class="form-control input-sm" name="rekam_medis"  value="<?php echo $rekam_medis; ?>">
		</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Nama Pasien</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control input-sm" name="nama_pasien" value="<?php echo $nama_pasien; ?>">
		</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Keterangan</label>
		<div class="col-sm-8">
		  <textarea class="form-control input-sm" name="ket">
		  	<?php echo $ket; ?>
		  </textarea> 
		</div>
  </div>
</form>