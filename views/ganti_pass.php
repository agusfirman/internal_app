
			<h3 class="text-center">Silahkan ganti password sesuai kebutuhan</h3><hr>
				<form class="form-horizontal"  method="post" action="controllers/ganti_pass/simpan_pass.php">
					<div class="form-group">
					<label class="col-sm-4 control-label">Password Lama</label>
						<div class="col-sm-6">
						<input type="password" class="form-control input-sm pass_lama"  placeholder="Masukan Password Lama">
						</div>
					</div>
					<div class="form-group">
					<label class="col-sm-4 control-label">Password Baru</label>
						<div class="col-sm-6">
						<input type="password" name="pass_baru" class="form-control input-sm pass_baru" placeholder="Masukan Password Baru">
						</div>
					</div>
					<div class="form-group">
					<label class="col-sm-4 control-label">Konfirmasi Password</label>
						<div class="col-sm-6">
						<input type="password" class="form-control input-sm con_pass" placeholder="Konfirmasi Password">
						</div>
					</div>
					<div class="form-group">
					<label class="col-sm-4 control-label"></label>
						<div class="col-sm-6">
							<button type="submit" class="btn btn-warning btn-sm btn-flat" id="btn_ganti" name="btn_ganti">Ganti Password</button>
						</div>
					</div>
				</form>
	
<script>
 $(document).ready(function(){
		
	$('.pass_lama').change(function(){
		var pass_lama =$(this).val();
		//alert(pass_lama);
		$.ajax({
			type: "POST", 
			url: "controllers/ganti_pass/ambil_pass.php", 
			data: "pass_lama="+pass_lama, 
			success:function(data){
          if(data==0){
				alert('Password Anda Salah, Silahkan Ulangi Kembali ');
					$(".pass_lama").val("");
					$(".pass_lama").focus();
				}
            }
		});
	});
	
	 $('#btn_ganti').click(function(){
		var pass_lama	= $('.pass_lama').val();
		var pass_baru	= $('.pass_baru').val();
		var con_pass	= $('.con_pass').val();
		if(pass_lama.length ==0){
			$('.pass_lama').focus();
			return false;
		}else if(pass_baru.length ==0){
			$('.pass_baru').focus();
			return false;
		}else if(con_pass.length ==0){
			$('.con_pass').focus();
			return false;
		}else if(pass_baru != con_pass){
			alert('Password Tidak Sama');
			$('.con_pass').focus();
			return false;
		}else{
				//	$('form').submit();
			
		}
			});
	 });
  </script>