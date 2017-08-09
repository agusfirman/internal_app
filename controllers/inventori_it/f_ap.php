<?php 
$id = $_POST[id];
include"../../include/koneksi.php";
if($id !='0'){
 	$query=$mysqli->query("SELECT * from access_point where id_ap='$id' ");
	$data_edit  = $query->fetch_array();   
	$cek  = mysqli_num_rows($query);  
	if($cek){
		$id 			= $id;
		$ssid 			= $data_edit[ssid];
		$id_ap 			= $data_edit[id_ap];
		$ip_address 	= $data_edit[ip_address];
		$lantai 		= $data_edit[lantai];    
		$ket 			= $data_edit[ket];    
		$lokasi 		= $data_edit[lokasi];
		$is_active 		= $data_edit[is_active];
	}
}else{
	$query = "SELECT max(id_task) AS last FROM task";  
	$hasil = $mysqli->query($query);  
	$data_tambah  = $hasil->fetch_array();  
	$last= $data_tambah['last'];  
	$ambil_last =  substr($last,2,3);
	$nextNoUrut = $ambil_last + 1;
	$nextNo = $today.sprintf('%03s', $nextNoUrut); 
	$id_lantai = "T".$nextNo;
}
	$query_cat = $mysqli->query("SELECT * FROM lantai");
 ?>

<form id="f_ap" class="form-horizontal" action="" method="post">
  <div class="form-group">
	<input type="hidden" class="form-control input-sm" name="id"  value="<?php echo $id; ?>">
	<label class="col-sm-3 control-label">SSID</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control input-sm" name="ssid" value="<?php echo $ssid; ?>">
		</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">IP Address</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control input-sm" name="ip_address" value="<?php echo $ip_address; ?>">
		</div>
  </div>
  <div class="form-group">
		<label class="col-sm-3 control-label">Lantai</label>
		<div class="col-sm-8">
			<select name="lantai" id="lantai" class="form-control input-sm" >
			<?php 
				echo '
				<option value="'.$lantai.'">'.$lantai.'</option>';
			 ?> 
				<option value="Basement">Basement</option>
				<option value="Dasar">Dasar</option>
				<option value="Lantai 1">Lantai 1</option>
				<option value="Lantai 2">Lantai 2</option>
				<option value="Lantai 3">Lantai 3</option>
				<option value="Lantai 5">Lantai 5</option>
			</select>
		</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Lokasi</label>
		<div class="col-sm-6">
		  <input type="text" class="form-control input-sm" name="lokasi" value="<?php echo $lokasi; ?>">
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

<script type="text/javascript">

$(document).ready(function(){
	$('#lantai').change(function(event) {
	  var url='controllers/task/ambil_kat.php';
	  var id_task = $("#lantai").val();
	  var main = 'mod/task/ambil_kat.php';
	  $.ajax({
	    type  : "POST",
	    url   : url,
	    data  : "id_task="+id_task,
	    success : function(data){
	      //alert(data);
	      $("#spek").html(data);
	    }
	  }); 
	});

});
</script>