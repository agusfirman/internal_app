<?php 
$id_unit = $_POST[id];
include"../../include/koneksi.php";
if($id_unit !='0'){
	$query = "SELECT m_departemen.*, m_units.*
              FROM m_departemen INNER JOIN m_units 
              ON m_units.id_departemen = m_departemen.id_departemen 
              where id_unit='$id_unit' ";  
	$hasil = $mysqli->query($query);
	$data  = $hasil->fetch_array();   
	$cek  = mysqli_num_rows($hasil);  
	if($cek){
		$id_unit = $id_unit;
		$id_departemen  =$data[id_departemen];
		$nama_departemen = $data[nama_departemen];
		$nama_unit = $data[nama_unit];
		$deskripsi = $data[deskripsi];
	}
}else{
	$query = "SELECT max(id_sub_cat) AS last FROM sub_task_cat ";  
	$hasil = $mysqli->query($query);  
	$data  = $hasil->fetch_array();  
	$last= $data['last'];  
	$ambil_last =  substr($last,2,3);
	$nextNoUrut = $ambil_last + 1;
	$nextNo = $today.sprintf('%03s', $nextNoUrut); 
	$sub_cat_id = "SC".$nextNo;
	$id_task_cat  ='';
	$nama_task_cat  ='Silahkan Pilih';
}

//ambil id cat
	$query_dep = $mysqli->query("SELECT * FROM m_departemen");
 ?>

<form id="f_units" class="form-horizontal" action="" method="post">
  <div class="form-group">
	<input type="hidden" class="form-control input-sm" name="id"  value="<?php echo $id_unit; ?>">
	<label class="col-sm-3 control-label">Departement </label>
		<div class="col-sm-8">
		<select name="id_departemen" class="form-control">
			<option value="<?php echo $id_departemen; ?>">
				<?php echo $nama_departemen; ?>
			</option>
			<?php 
			while($data_dep   = $query_dep->fetch_array()){
				$id_departemen =$data_dep[id_departemen];
				$nama_departemen = $data_dep[nama_departemen];   
				echo '<option value="'.$id_departemen.'">'.$nama_departemen.'</option>';
			}
			 ?>
		</select>
		</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Nama Unit</label>
		<div class="col-sm-4">
		  <input type="text" class="form-control input-sm" name="nama_unit"  value="<?php echo $nama_unit; ?>">
		</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Deskripi</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control input-sm" name="deskripsi" value="<?php echo $deskripsi; ?>">
		</div>
  </div>
</form>