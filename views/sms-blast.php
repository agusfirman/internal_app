<h2 class="text-center"> FORM SMS Blast</h2>
<hr/> 
 <form class="form-horizontal" action="cetak/print-out-smsblast.php" method="post" target="_blank" onSubmit="confirm();">
	  <div class="form-group">
		<label class="col-sm-2 control-label">NIP</label>
		<div class="col-sm-2">
		  <input type="text" class="form-control input-sm" name="nip" id="nip" placeholder="NIK" autofocus>
		</div>
	  </div>
	  <div class="form-group">
		<label class="col-sm-2 control-label">Nama</label>
		<div class="col-sm-4">
		  <input type="text" class="form-control input-sm" name="nama" id="nama" placeholder="Nama" autofocus>
		</div>
	  </div>
	  <div class="form-group">
		<label class="col-sm-2 control-label">Bagian</label>
		<div class="col-sm-3">
		  <input type="text" class="form-control input-sm" name="bagian" id="bagian" placeholder="Bagian" autofocus>
		</div>
	  </div>
	  <div class="form-group">
		<label class="col-sm-2 control-label">Jabatan</label>
		<div class="col-sm-3">
		  <input type="text" class="form-control input-sm" name="jabatan" id="jabatan" placeholder="Jabatan" autofocus>
		</div>
	  </div>
	  <div class="form-group">
		<label  class="col-sm-2 control-label">Isi Pesan</label>
		<div class="col-sm-6"><textarea name="isi_pesan" class="form-control input-sm" rows="3" placeholder="Isi Pesan"></textarea>
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-6">
		  <button type="submit" id="btn-printsmsblast" class="btn btn-warning btn-sm btn-flat" target="_blank" >
		  <span class="glyphicon glyphicon-print"></span> Cetak</button>
		  <button type="reset" class="btn btn-warning btn-sm btn-flat btn-reset"><span class="glyphicon glyphicon-refresh"></span> Kosongkan</button>
		</div>
	  </div>
	</form>

<script>
$(document).on("click", "#btn-printsmsblast", function() {
	if (confirm('Apakah anda yakin ?')) {
	 	$('. btn-reset').click();
	}else{
        return false;
    }
});
</script>