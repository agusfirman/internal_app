<?php 
$id_sub_cat = $_POST[id_sub_cat];
include"../../include/koneksi.php";
if($id_sub_cat !='0'){
	$query = "SELECT task_cat.*, sub_task_cat.*
              FROM sub_task_cat
              INNER JOIN task_cat ON sub_task_cat.id_cat = task_cat.id_task_cat 
              where id_sub_cat='$id_sub_cat' ";  
	$hasil = $mysqli->query($query);
	$data  = $hasil->fetch_array();   
	$cek  = mysqli_num_rows($hasil);  
	if($cek){
		$sub_cat_id = $id_sub_cat;
		$nama_sub_cat = $data[nama_sub_cat];
		$deskripsi = $data[deskripsi];
		$id_task_cat  =$data[id_cat];
		$nama_task_cat  =$data[nama_task_cat];
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
	$query_cat = $mysqli->query("SELECT * FROM task_cat");
 ?>

<form id="f_sub_task_ca" class="form-horizontal" action="" method="post">
  <div class="form-group">
	<label class="col-sm-3 control-label">ID Sub Cat </label>
		<div class="col-sm-2">
		  <input type="text" class="form-control input-sm" name="sub_cat_id" readonly value="<?php echo $sub_cat_id; ?>">
		</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Nama Kategori</label>
		<div class="col-sm-8">
		<select name="id_cat_task" class="form-control">
			<option value="<?php echo $id_task_cat; ?>">
				<?php echo $nama_task_cat; ?>
			</option>
			<?php 
			while($data_cat   = $query_cat->fetch_array()){
				$id_cat =$data_cat[id_task_cat];
				$nama_task_cat = $data_cat[nama_task_cat];   
				echo '<option value="'.$id_cat.'">'.$nama_task_cat.'</option>';
			}
			 ?>
		</select>
		</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Nama Sub Kategori</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control input-sm" name="nama_sub_cat" value="<?php echo $nama_sub_cat; ?>">
		</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Deskripi</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control input-sm" name="deskripsi" value="<?php echo $deskripsi; ?>">
		</div>
  </div>
</form>