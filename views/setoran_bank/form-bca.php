<h3 style="margin-top:80px" class="text-center text-red"> FORM BUKTI SETORAN || BANK BCA</h3>
<hr/> 
<form id="form_bca" class="form-horizontal" action="" method="get" onsubmit="popup_print(this">
  <div class="form-group">
	<label class="col-sm-3 control-label">Nama Pemilik Rekening</label>
		<div class="col-sm-3">
		  <select class="form-control input-sm" name="nama"  id="nama" autofocus>
		  	<option value="">Nama Pemilik Rekening</option>
		  	<?php 
		  	include("include/koneksi.php");
		  	$sql = "select id, nama_dokter from dt_dokter where norek_bca !='-' order by nama_dokter ASC ";
		  	$result =$mysqli->query($sql);
		  	while($data = $result->fetch_array()){
		  		echo '<option value="'.$data[id].'">'.$data[nama_dokter].'</option>';
		  	}
		  	 ?>
		  </select>
		</div>
  </div>
  <div class="form-group">
		<label class="col-sm-3 control-label">No. Rekening / Customer</label>
		<div class="col-sm-4">
			<input type="text" class="form-control input-sm" name="norek"  id="norek" placeholder="No Rekening" readonly>
		</div>
  </div>
  <div class="form-group">
	<label class="col-sm-3 control-label">Nama Penyetor</label>
	<div class="col-sm-4">
	  <input type="text" class="form-control input-sm" name="nama_penyetor" id="nama_penyetor"  placeholder="Nama Penyetor" readonly >
	</div>
  </div>
 <div class="form-group">
	<label  class="col-sm-3 control-label">Alamat Penyetor</label>
	<div class="col-sm-4">
	<input type="text" class="form-control input-sm" name="alm_penyetor" id="alm_penyetor"  placeholder="Alamat Penyetor" readonly >
	</div>
  </div>
  <div class="form-group">
	<label  class="col-sm-3 control-label">No. Telp</label>
	<div class="col-sm-4">
	  <input type="text" class="form-control input-sm" name="telp" id="telp" placeholder="No. Handphone" readonly>
	</div>
  </div>
  <div class="form-group">
	<label  class="col-sm-3 control-label">Jumlah Nominal</label>
	<div class="col-sm-4">
	  <input type="text" class="form-control input-sm" name="nominal" id="nominal" placeholder="Jumlah Nominal">
	</div>
  </div>
  <div class="form-group">
	<div class="col-sm-offset-3 col-sm-6">
	  <!-- <button type="submit" class="btn btn-primary btn-sm btn-flat"  id=""><span class="glyphicon glyphicon-print" onClick="popup_print()"  ></span> 
	  Cetak

	  </button> -->

    <button type="button" class="btn btn-primary btn-sm btn-flat" value="" id="btn_cetak_bca" onClick="" /><span class="glyphicon glyphicon-print" onClick="popup_print()"  ></span> 
   	Print
    </button> 
	  <button type="reset" class="btn btn-primary btn-sm btn-flat"><span class="glyphicon glyphicon-refresh"></span> Kosongkan</button>
	</div>
  </div>
</form>

<div>
    <!-- <input type="button" value="Print" class="btn" onclick="PrintDoc()"/> -->
    
</div>

<script type="text/javascript">
// cetak/print-out-bca.php

function popup_print(form){
window.open('pop-print-out-bca.php?norek=<?php echo [norek] ?>','page','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
}
$(document).ready(function(){
	var nama = $('#nama');
	var norek = $('#norek');
	var nama_penyetor = $('#nama_penyetor');
	var alm_penyetor = $('#alm_penyetor');
	var telp = $('#telp');
	var nom = $('#nominal');
	
	$("#btn_cetak_bca").click(function(event) {
		if(nama.val().length==0){
			nama.focus();
			return false;
		}else if(nom.val().length==0){
			nom.focus();
			return false;
		}else{
			popup_print();
		}
	});	
	
	$(norek).on('keypress', function(e) {
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
		$(nom).on('keypress', function(e) {
		 var c = e.keyCode || e.charCode;
		 switch (c) {
		  case 8: case 9: case 27: case 13: return;
		  case 65:
		   if (e.ctrlKey === true) return;
		 }
		 if (c < 48 || c > 57) e.preventDefault();
		});

		//buat combo nama dokter ketika di pilih
		$("#nama").change(function(){
			var id = $("#nama").val();
			var url = "views/ambil_data.php"
			 $.ajax({
				type : "POST",
		        url  : url,
                dataType: "json",
		        data : "id_dokter="+id,
		        cache: false,
		        success: function(data){
	            //jika data sukses diambil dari server kita tampilkan
	            //alert(data);
	            $("#norek").val(data.norek);
	            $("#nama_penyetor").val(data.nama_penyetor);
	            $("#alm_penyetor").val(data.alamat);
	            $("#telp").val(data.telp);
	        	}
	    	});
		});
});
</script>