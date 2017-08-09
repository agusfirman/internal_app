<br/>
<div class="box-header">
	<div class="box-title">
		<h2 class="text-center"> Form Disposisi Barang IT</h2>
	</div>
</div>
<hr/> 
 <form class="form-horizontal" action="cetak/print-out-disposisi.php" method="post" target="_blank" onSubmit="confirm();">
	  <div class="form-group">
		<label class="col-sm-2 control-label">Nip</label>
		<div class="col-sm-2">
		  <input type="text" class="form-control input-sm" name="nip" id="nip" placeholder="NIP Pemohon" autofocus>
		</div>
	  </div>
	  <div class="form-group">
		<label class="col-sm-2 control-label">Nama Pemohon</label>
		<div class="col-sm-3">
		  <input type="text" class="form-control input-sm" name="nm_pemohon" id="nm_pemohon" placeholder="Nama Pemohon" autofocus>
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
		<label class="col-sm-2 control-label">Lokasi Awal</label>
		<div class="col-sm-4">
		  <input type="text" class="form-control input-sm" name="lok_awal" placeholder="Lokasi Awal" autofocus>
		</div>
	  </div>
	  <div class="form-group">
		<label class="col-sm-2 control-label">Lokasi Tujuan</label>
		<div class="col-sm-4">
		  <input type="text" class="form-control input-sm" name="lok_tujuan"  placeholder="Lokasi Tujuan" autofocus>
		</div>
	  </div>
	  <div class="form-group">
		<label class="col-sm-2 control-label">Tanggal</label>
		<div class="col-sm-2">
		  <input type="text" class="form-control input-sm datepicker" name="tgl" id="tgl" placeholder="Tgl" autofocus>
		</div>
	  </div>
	  <div class="form-group">
		<label class="col-sm-2 control-label">Nama Barang</label>
		<div class="col-sm-3">
		  <input type="text" class="form-control input-sm" name="nm_barang" id="nm_barang" placeholder="Nama Barang" autofocus>
		</div>
	  </div>
	  <div class="form-group">
		<label class="col-sm-2 control-label">Jumlah</label>
		<div class="col-sm-2">
		  <input type="text" class="form-control input-sm" name="jumlah"  placeholder="Quantity	" autofocus>
		</div>
	  </div>
	  <div class="form-group">
		<label  class="col-sm-2 control-label">Keterangan</label>
		<div class="col-sm-6"><textarea name="keterangan" class="form-control input-sm" rows="3" placeholder="Keterangan"></textarea>
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-6">
		  <button type="submit" id="btn-printsmsblast" class="btn btn-warning btn-sm btn-flat" >
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