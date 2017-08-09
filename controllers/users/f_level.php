<?php 
$id = $_POST[id];
if($id !="0"){
	include"../../include/koneksi.php";
 	$query=$mysqli->query("select * from level_users where id_level='$id' ");
    $cek=mysqli_num_rows($query);
    $data = $query->fetch_array();
    $nama_level = $data[nama_level];
    $departemen = $data[departemen];

    if($data[level]==1){
          $level = "<font color='green'>administrator</font>";
        }else if($data[level]==2){
          $level = "<font color='orange'>op. keuangan</font>";
        }else if($data[level]==3){
          $level = "<font color='orange'>op. PPB</font>";
        }else if($data[level]==4){
          $level = "<font color='red'>Lainya</font>";
        }
}
 ?>

<form id="f_level" class="form-horizontal" action="" method="post">
  <div class="form-group">
	<label class="col-sm-3 control-label">Nama</label>
		<div class="col-sm-6">
			<input type="hidden" class="form-control input-sm" name="id"  value="<?php echo $id; ?>">
		  <input type="text" class="form-control input-sm" name="nama_level"  value="<?php echo $nama_level; ?>" >
		</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Departemen</label>
	<div class="col-sm-6">
	  <input type="text" class="form-control input-sm" name="departemen"   value="<?php echo $departemen; ?>" >
	</div>
  </div>
</form>

<script type="text/javascript">
// cetak/print-out-bca.php
$(document).ready(function(){
	var nama_level = $('input:text[name=nama_level]');
	var departemen = $('input:text[name=departemen]');
	$("#b_level").bind("click", function(event) {	
		//alert("test");
		var url="models/users/simpan_level_users.php";
		var string = $("#f_level").serialize();
		var main = 'views/users/level_akses.php';

		if(nama_level.val().length==0){
			nama_level.focus();
		return false;
		}else if(departemen.val().length==0){
			departemen.focus();
		return false;
		}
			$.ajax({
			type	: "POST",
			url		: url,
			data	: string,
			success	: function(data){
				$("#m_level").modal('hide');
				//alert(data);
					location.reload();
				}
			});
		});
	
$(nik).on('keypress', function(e) {
	 var c = e.keyCode || e.charCode;
	 switch (c) {
	  case 8: case 9: case 27: case 13: return;
	  case 65:
	   if (e.ctrlKey === true) return;
	 }
	 if (c < 48 || c > 57) e.preventDefault();
	});
});
</script>