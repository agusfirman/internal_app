<form id="f_regis" class="form-horizontal" action="" method="post">
  <div class="form-group">
		<label class="col-sm-3 control-label">NIK</label>
		<div class="col-sm-4">
			<input type="text" class="form-control input-sm" name="nik"  placeholder="NIK" autofocus>
		</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Nama</label>
		<div class="col-sm-6">
		  <input type="text" class="form-control input-sm" name="nama"  placeholder="Nama " >
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
	<label class="col-sm-3 control-label">Username</label>
	<div class="col-sm-6">
	  <input type="text" class="form-control input-sm" name="users"  placeholder="Username" >
	</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Password</label>
	<div class="col-sm-6">
	  <input type="password" class="form-control input-sm" name="pass"  placeholder="Password" >
	</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Unit Kerja</label>
	<div class="col-sm-4">
	<select name="level" id="" class="form-control input-sm select" >
		<option value="">Silahkan Pilih</option>
		<option value="2">Keuangan</option>
		<option value="3">UGD</option>
		<option value="4">Perawat Lt1</option>
		<option value="5">Perawat Lt2</option>
		<option value="6">Perawat Lt3</option>
		<option value="7">Poliklinik</option>
		<option value="8">VK</option>
		<option value="9">NICU</option>
		<option value="10">OK</option>
		<option value="10">Kamar Bayi</option>		
		<option value="11">Marketing</option>
		<option value="12">Rekam Medis</option>
		<option value="13">Lainya</option>
	</select>
	</div>
  </div>
</form>