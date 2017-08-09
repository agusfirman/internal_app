<h2 class="text-center"> FORM PENGAJUAN USERS TERAMEDIK</h2><hr />
<form class="form-horizontal" action="controllers/sent_mail.php" method="post" target="" >
  <div class="form-group">
	<label class="col-sm-3 control-label">NIK</label>
	<div class="col-sm-4">
	  <input type="text" class="form-control input-sm" name="nik"  placeholder="No Induk Karyawan" autofocus>
	</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Nama Lengkap</label>
	<div class="col-sm-6">
	  <input type="text" class="form-control input-sm" name="nama"  placeholder="Nama Lengkap" autofocus>
	</div>
  </div>
  <div class="form-group">
	<label  class="col-sm-3 control-label">Jenis Kelamin</label>
	<div class="col-sm-6">	
		<label class="radio-inline">
		  <input type="radio" name="jkel" value="L">Laki- Laki
		</label>
		<label class="radio-inline">
		  <input type="radio" name="jkel" value="P"> Perempuan
		</label>
	</div>
  </div>
 <div class="form-group">
	<label  class="col-sm-3 control-label">Tempat Lahir</label>
	  	<div class="col-sm-4">
		<input type="text" class="form-control input-sm" name="tmp"  placeholder="Tempat Lahir" >
	</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Tanggal Lahir</label>
	<div class="col-sm-3">
	 <div class="input-group" data-placement="left" data-align="top" data-autoclose="true" >
					<input type="text" name="tgl_lhr" class="form-control input-sm datepicker" placeholder="dd/mm/yyyy" />
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
	</div>
  </div>
  <div class="form-group">
	<label  class="col-sm-3 control-label">No. Telp /HP</label>
	<div class="col-sm-4">
	  <input type="text" class="form-control input-sm" name="telp" placeholder="No. Handphone">
	</div>
  </div>
  <div class="form-group" id="pin" style="display:none">
	<label  class="col-sm-3 control-label">PIN BBM</label>
	<div class="col-sm-4">
	  <input type="text" class="form-control input-sm" name="pin" placeholder="PIN BBM">
	</div>
  </div>
  <div class="form-group">
	<label  class="col-sm-3 control-label">Tanggal Masuk Kerja</label>
	<div class="col-sm-3">
		<div class="input-group" data-placement="left" data-align="top" data-autoclose="true">
			<input type="text" name="tgl_msk" class="form-control input-sm datepicker" placeholder="dd/mm/yyyy" />
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-calendar"></span>
			</span>
		</div>
	</div>
  </div>
  <div class="form-group">
	<label  class="col-sm-3 control-label">No. Ext</label>
	<div class="col-sm-4">
	  <input type="text" class="form-control input-sm" name="ext" placeholder="No. Ext">
	</div>
  </div>
  <div class="form-group">
	<div class="col-sm-offset-3 col-sm-6">
	  <button type="submit" class="btn btn-primary btn-sm submit btn-flat" target="" >
	  <span class="glyphicon glyphicon-circle-arrow-right" onclick=""></span> Submit</button>
	  <button type="reset" class="btn btn-primary btn-sm btn-flat"><span class="glyphicon glyphicon-refresh"></span> Kosongkan</button>
	</div>
  </div>
</form>
<script type="text/javascript">
$(document).ready(function(){		
			var nik = $('input:text[name=nik]');
			var nama = $('input:text[name=nama]');
			var tmp = $('input:text[name=tmp]');
			var tgl_lhr = $('input:text[name=tgl_lhr]');
			var telp = $('input:text[name=telp]');
			var tgl_msk = $('input:text[name=tgl_msk]');
			var ext = $('input:text[name=ext]');	
			var jkel = $('input:radio[name=jkel]');	
			
		$('.submit').bind("click", function(event) {	
				
			if(nik.val().length==0){
			nik.focus();
			return false;
			}else if(nama.val().length==0){
				nama.focus();
			return false;
			}else if(tmp.val().length==0){
				tmp.focus();
			return false;
			}else if(tgl_lhr.val().length==0){
			tgl_lhr.focus();
			return false;
			}else if(telp.val().length==0){
			telp.focus();
			return false;
			}else if(tgl_msk.val().length==0){
			tgl_msk.focus();
			return false;
			}else if(ext.val().length==0){
			ext.focus();
			return false;
			}
					$("form").submit();
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
		$(ext).on('keypress', function(e) {
		 var c = e.keyCode || e.charCode;
		 switch (c) {
		  case 8: case 9: case 27: case 13: return;
		  case 65:
		   if (e.ctrlKey === true) return;
		 }
		 if (c < 48 || c > 57) e.preventDefault();
		});
		$(telp).on('keypress', function(e) {
		 var c = e.keyCode || e.charCode;
		 switch (c) {
		  case 8: case 9: case 27: case 13: return;
		  case 65:
		   if (e.ctrlKey === true) return;
		 }
		 if (c < 48 || c > 57) e.preventDefault();
		});
		// $(jkel).click(function(){
		// 	if($(this).attr('checked','checked')){
		// 		if($(this).val('P')){
		// 			$("#pin").css("display","block");
		// 		}else if($(this).val('L')){
		// 			$("#pin").css("display","none");
		// 		}
		// 		//alert($(this).val());
		// 	}
		// });
});
</script>