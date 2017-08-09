<h2 class="text-center"> FORM PEMESANAN FOTO BAYI</h2>
<hr/> 
 <form class="form-horizontal" action="cetak/print-out-pfb.php" method="post" target="_blank" onSubmit="return confirm('Apakah anda yakin ? ')">
	  <div class="form-group">
		<label class="col-sm-2 control-label">Nama Bayi</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control input-sm" name="nama" id="nama" placeholder="Nama Bayi" autofocus>
		</div>
	  </div>
	  <div class="form-group">
		<label  class="col-sm-2 control-label">Jenis Kelamin</label>
		<div class="col-sm-8">	
			<label class="radio-inline">
			  <input type="radio" name="jkel" class="minimal" value="1">Laki- Laki
			</label>
			<label class="radio-inline">
			  <input type="radio" name="jkel" class="minimal" value="2"> Perempuan
			</label>
		</div>
	  </div>
	  <div class="form-group">
		<label  class="col-sm-2 control-label">Hari Lahir</label>
		<div class="col-sm-3">
			<select class="form-control input-sm" name="hr_lhr">
			  <option value="">Silahkan Pilih</option>
			  <option value="Minggu">Minggu</option>
			  <option value="Senin">Senin</option>
			  <option value="Selasa">Selasa</option>
			  <option value="Rabu">Rabu</option>
			  <option value="Kamis">Kamis</option>
			  <option value="Jumat">Jumat</option>
			  <option value="Sabtu">Sabtu</option>
			</select>
		</div>
	  </div>
	  <div class="form-group">
		<label  class="col-sm-2 control-label" for="datepicker">Tanggal Lahir</label>
			<div class="col-sm-3">
				<div class="input-group" data-placement="left" data-align="top" data-autoclose="true">
					<input name="tgl_lhr" class="form-control input-sm datepicker"  placeholder="dd/mm/yyyy">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
		<label  class="col-sm-2 control-label">Jam Lahir</label>
		<div class="col-sm-3">
			<div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
			    <input class="form-control input-sm" name="jam_lhr" >
			    <span class="input-group-addon">
			        <span class="glyphicon glyphicon-time"></span>
			    </span>
			</div>
		</div>
	  </div>
	  <div class="form-group">
		<label  class="col-sm-2 control-label">Berat</label>
		<div class="col-sm-3">
		   <div class="input-group">
			  <input type="text" name="berat" class="form-control input-sm" placeholder="0">
			  <div class="input-group-addon">gram</div>
			</div>
		</div>
		<label  class="col-sm-2 control-label">Panjang</label>
			<div class="col-sm-3">
			   <div class="input-group">
				  <input type="text" name="panjang" class="form-control input-sm"  placeholder="0">
				  <div class="input-group-addon">cm</div>
				</div>
			</div>
	  </div>
	  <div class="form-group">
		<label  class="col-sm-2 control-label">Nama Ibu</label>
		<div class="col-sm-6">
		  <input type="text" class="form-control input-sm" name="nama_ibu" placeholder="Nama Ibu">
		</div>
	  </div>
	  <div class="form-group">
		<label  class="col-sm-2 control-label">Nama Ayah</label>
		<div class="col-sm-6">
		  <input type="text" class="form-control input-sm" name="nama_ayah" placeholder="Nama Ayah">
		</div>
	  </div>
	  <div class="form-group">
		<label  class="col-sm-2 control-label">Dokter Obsgyn</label>
		<div class="col-sm-6">
		  <input type="text" class="form-control input-sm" name="dr_ob" placeholder="Dokter Obsgyn">
		</div>
	  </div>
	  <div class="form-group">
		<label  class="col-sm-2 control-label">Dokter Anak</label>
		<div class="col-sm-6">
		  <input type="text" class="form-control input-sm" name="dr_an" placeholder="Dokter Anak">
		</div>
	  </div>
	  <div class="form-group">
		<label  class="col-sm-2 control-label">Alamat</label>
		<div class="col-sm-6"><textarea name="alamat" class="form-control input-sm" rows="3" placeholder="Alamat"></textarea>
		</div>
	  </div>
	  <div class="form-group">
		<label  class="col-sm-2 control-label">No. HP</label>
		<div class="col-sm-4">
		  <input type="text" class="form-control input-sm" name="telp" placeholder="No. Handphone">
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-6">
		  <button type="submit" href="print-out.php" id="btn-print" class="btn btn-warning btn-sm btn-flat" target="_blank" >
		  <span class="glyphicon glyphicon-print" onclick="return alert('Apakah anda yakin..?')"></span> Cetak</button>
		  <button type="reset" class="btn btn-warning btn-sm btn-flat"><span class="glyphicon glyphicon-refresh"></span> Kosongkan</button>
		</div>
	  </div>
	</form>