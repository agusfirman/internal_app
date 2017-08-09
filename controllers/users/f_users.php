<?php 
$id = $_POST[id];
if($id !="0"){
	include"../../include/koneksi.php";
 	$query=$mysqli->query("select * from users where username='$id' ");
    $cek=mysqli_num_rows($query);
    $data = $query->fetch_array();
    $nik = $data[nik];
    $nama = $data[nama];
    $jkel = $data[j_kel];
    $username = $data[username];
    $password = base64_decode($data[password]);

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

<form id="f_users" class="form-horizontal" action="" method="post">
  <div class="form-group">
		<label class="col-sm-3 control-label">NIK</label>
		<div class="col-sm-4">
			<input type="hidden" class="form-control input-sm" name="id"  value="<?php echo $id; ?>">
			<input type="text" class="form-control input-sm" name="nik"  value="<?php echo $nik ?>" autofocus>
		</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Nama</label>
		<div class="col-sm-6">
		  <input type="text" class="form-control input-sm" name="nama"  value="<?php echo $nama; ?>" >
		</div>
  </div>
  <div class="form-group">
	<label  class="col-sm-3 control-label">Jenis Kelamin</label>
	<div class="col-sm-6">	
		<label class="radio-inline">
		  <input type="radio" name="jkel" class="minimal" value="L" <?php if($jkel=="L"){echo"checked";} ?> >Laki- Laki
		  <!--  -->
		</label>
		<label class="radio-inline">
		  <input type="radio" name="jkel" class="minimal" value="P"  <?php if($jkel=="P"){echo"checked";} ?>> Perempuan
		</label>
	</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Username</label>
	<div class="col-sm-6">
	  <input type="text" class="form-control input-sm" name="usersname"   value="<?php echo $username; ?>" >
	</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Password</label>
	<div class="col-sm-6">
	  <input type="password" class="form-control input-sm" name="pass"   value="<?php echo $password; ?>">
	</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Hak akses</label>
	<div class="col-sm-4">
	<select name="level" id="" class="form-control input-sm" >
		<option value="">Silahkan Pilih</option>
		<option value="1">Admin</option>
		<option value="2">Keuangan</option>
		<option value="3">Perawat</option>
		<option value="4">Lainya..</option>
	</select>
	</div>
	<span><?php echo $level; ?></span>
  </div>
</form>

<script type="text/javascript">
// cetak/print-out-bca.php
$(document).ready(function(){

	var nik = $('input:text[name=nik]');
	var nama = $('input:text[name=nama]');
	var usersname = $('input:text[name=usersname]');
	var pass = $('input:password[name=pass]');	
	var level = $('select[name=level]');	


	$('#b_users').bind("click", function(event) {	
		var url="controller/users/simpan_users.php";
		var string = $("#f_users").serialize();
		var main = 'controller/users/tampil_users.php';

		alert(val(nik));
		if(nik.val().==0){
		nik.focus();
		return false;
		}else if(nama.val().length==0){
			nama.focus();
		return false;
		}else if(usersname.val().length==0){
			usersname.focus();
		return false;
		}else if(pass.val().length==0){
		pass.focus();
		return false;
		}else if(level.val().length==0){
		level.focus();
		return false;
		}
			$.ajax({
			type	: "POST",
			url		: url,
			data	: string,
			success	: function(data){
				$("#m_users").modal('hide');
					location.reload();
			}); 
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