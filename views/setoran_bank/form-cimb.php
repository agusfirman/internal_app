<h3 style="margin-top:80px" class="text-center text-red"> FORM BUKTI SETORAN || BANK CIMB NIAGA</h3>
<hr/> 
<form id="form_cimb" class="form-horizontal" action="" method="post" target="" >
  <div class="form-group">
	<label class="col-sm-3 control-label">Nama Pemilik Rekening</label>
		<div class="col-sm-3">
		  <select class="form-control input-sm" name="nama"  id="nama" autofocus>
		  	<option value="">Nama Pemilik Rekening</option>
		  	<?php 
		  	include("include/koneksi.php");
		  	$result= $mysqli->query("select id, nama_dokter from dt_dokter where norek_cimb !='-' order by nama_dokter ASC");
		  	while($data = $result->fetch_array()){
		  		$nama_dokter =$data[nama_dokter];
		  		echo '<option value="'.$data[id].'" >'.$nama_dokter.'</option>';
		  	}
		  	 ?>
		  </select>
		</div>
  </div>
  <div class="form-group">
		<label class="col-sm-3 control-label">No. Rekening / Customer</label>
		<div class="col-sm-4">
			<input type="text" class="form-control input-sm" name="norek"  id="norek" placeholder="No Rekening" readonly>
			<input type="hidden" class="form-control input-sm" name="nama_dokter_tampil"  id="nama_dokter_tampil" placeholder="Nama Dokter" readonly>
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
	  <input type="hidden" class="form-control input-sm" name="nominal_hidden" id="nominal_hidden" placeholder="Jumlah Nominal">
	</div>
  </div>
  <div class="form-group">
	<div class="col-sm-offset-3 col-sm-6">
	  <button type="submit" class="btn btn-primary btn-sm btn-flat"  id="btn_cetak_cimb"><span class="glyphicon glyphicon-print"  onClick="popup_print()"  ></span> 
	  Cetak
	  </button>
	  <button type="submit" class="btn btn-primary btn-sm btn-flat btn_cetak_pre"  id=""><span class="glyphicon glyphicon-print"  onClick=""  ></span> 
	  Cetak Preview
	  </button>
	  <button type="reset" class="btn btn-primary btn-sm btn-flat"><span class="glyphicon glyphicon-refresh"></span> Kosongkan</button>
	</div>
  </div>
</form>

<script type="text/javascript" src="views/setoran_bank/terbilang.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var nama = $('#nama');
	var norek = $('#norek');
	var nama_penyetor = $('#nama_penyetor');
	var alm_penyetor = $('#alm_penyetor');
	var telp = $('#telp');
	var nom = $('#nominal');
	var nominal_hidden = $("#nominal_hidden");
	
	$("#btn_cetak_cimb").click(function(event) {
		if(nama.val().length==0){
			nama.focus();
			return false;
		}else if(norek.val().length==0){
			norek.focus();
			return false;
		}else if(nama_penyetor.val().length==0){
			nama_penyetor.focus();
			return false;
		}else if(alm_penyetor.val().length==0){
			alm_penyetor.focus();
			return false;
		}else if(telp.val().length==0){
			telp.focus();
			return false;
		}else if(nom.val().length==0){
			nom.focus();
			return false;
		}
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

   $(nom).change(function () {
   		var isi = nom.val();
   		ubah(isi);
    	
	});
  		 function ubah(nilai){
		 //memanggil fungsi terbilang() dari file terbilang.js
		 var hasil = terbilang(nilai);
		 var uphasil = hasil.toUpperCase();
		 var trp = 'RUPIAH'.trim();
		  		nominal_hidden.val(uphasil+trp); 
	  	}

		//buat combo nama dokter ketika di pilih
		$("#nama").change(function(){
			var id = $("#nama").val();
			var url = "views/ambil_data.php";
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
	            $("#nama_dokter_tampil").val(data.nama_dokter);
	        	}
	    	});
		});


$(".btn_cetak_pre").click(function(event){
event.preventDefault();
	//validasi jika nominal kosong
	if(nama.val().length==0){
		nama.focus();
		return false;
	}else if(nom.val().length==0){
		nom.focus();
		return false;
	} 
var string = $('#form_cimb').serialize();
	var url = "views/setoran_bank/preview.php";
		$.ajax({
					type: "POST",
					dataType:"json",
					url: url,
					data: string,
					success: function(data) {
						$("#m-print").modal('show');
	            		$("#norek_tampil").text(data.norek);
	            		$("#nama").text(data.nama);
	            		$("#nama_dokter_tampil2").text(data.nama_dokter_tampil);
	            		$("#nama_penyetor_tampil").text(data.nama_penyetor);
	            		$("#alm_penyetor_tampil").text(data.alm_penyetor);
	            		$("#telp_tampil").text(data.telp);
	            		$("#nominal_tampil").text(data.nominal);
	            		$("#terbilang_tampil").text(data.nominal_hidden);

				}
			});


	});

    $('.modal.printable').on('shown.bs.modal', function () {
        $('.modal-dialog', this).addClass('focused');
        $('body').addClass('modalprinter');

    }).on('hidden.bs.modal', function () {
        $('.modal-dialog', this).removeClass('focused');
        $('body').removeClass('modalprinter');
        //location.reload();
    });
});	

</script>

  <!-- testting modal print -->

<!--   /** Print css **/ -->
<style type="text/css">
		@media print {
		    body.modalprinter * {
		        visibility: hidden;
		    }

		    body.modalprinter .modal-dialog.focused {
		        position: absolute;
		        padding: 0;
		        margin: 0;
		        left: 0;
		        top: 0;
		    }

		    body.modalprinter .modal-dialog.focused .modal-content {
		        border-width: 0;
		    }

		    body.modalprinter .modal-dialog.focused .modal-content .modal-header .modal-title,
		    body.modalprinter .modal-dialog.focused .modal-content .modal-body,
		    body.modalprinter .modal-dialog.focused .modal-content .modal-body * {
		        visibility: visible;
		        width: 100%;
		    }

		    body.modalprinter .modal-dialog.focused .modal-content .modal-header,
		    body.modalprinter .modal-dialog.focused .modal-content .modal-body {
		        padding: 0;
		        width: 100%;
		    }

		    body.modalprinter .modal-dialog.focused .modal-content .modal-header .modal-title {
		        margin-bottom: 20px;
		    }
		}
   .table th, .table td { 
        border-top: none !important;
        border-left: none !important;
    }
			
</style>

<script>
  $().ready(function () {
  });
</script>

<div class="modal fade printable" id="m-print" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">x</button>
      </div>
      <div class="modal-body" style="position:relative; top:0; left:0;">
      <!-- <h2>Striped Rows</h2>
		  <p>The .table-striped class adds zebra-stripes to a table:</p>            
		  <table width="100%" cellspacing="0" > 
		    <thead>
		      <tr>
		        <th>Firstname</th>
		        <th>Lastname</th>
		        <th>Email</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
		        <td>John</td>
		        <td>Doe</td>
		        <td>john@example.com</td>
		      </tr>
		      <tr>
		        <td>Mary</td>
		        <td>Moe</td>
		        <td>mary@example.com</td>
		      </tr>
		      <tr>
		        <td>July</td>
		        <td>Dooley</td>
		        <td>july@example.com</td>
		      </tr>
		    </tbody>
		  </table> -->
      	<!-- <table  class="table table-striped">
			<tr>
				<td align="right" colspan="6">&nbsp;</td>
			</tr><tr>
				<td align="right" colspan="6">&nbsp;</td>
			</tr><tr>
				<td align="right" colspan="6">&nbsp;</td>
			</tr><tr>
				<td align="right" colspan="6">&nbsp;</td>
			</tr><tr>
				<td rowspan="3">&nbsp;</td>
				<td align="left" colspan="2" ><div style="position:relative;left:-60px;top:-15px" id="norek_tampil" ></div></td>
				<td colspan="3" rowspan="3">&nbsp;</td>
			</tr><tr>
				<td align="left" colspan="2"><div style="position:relative;left:-80px;top:-12px" id="nama"></div></td>
				</tr><tr>
				<td align="left" colspan="2"><div style="position:relative;left:-60px;top:-12px" id="nama_penyetor_tampil"></div></td>
			</tr><tr>
				<td align="right" colspan="6">&nbsp;</td>
			</tr><tr>
				<td align="right" colspan="6">&nbsp;</td>
			</tr><tr>
				<td align="right" colspan="6">&nbsp;</td>
			</tr><tr>
				<td align="right" colspan="6">&nbsp;</td>
			</tr><tr>
				<td align="right" colspan="6">&nbsp;</td>
			</tr><tr>
				<td align="right" colspan="6">&nbsp;</td>
			</tr><tr>
				<td align="right" colspan="6">&nbsp;</td>
			</tr><tr>
				<td align="right" colspan="6">&nbsp;</td>
			</tr><tr>
				<td align="right"  colspan="3" width="55%">&nbsp;</td>
				<td align="center" width="7%">Rp.</td>
				<td  colspan="2	" align="left" id="nominal_tampil"></td>
			</tr><tr>
				<td align="right" colspan="6">&nbsp;</td>
			</tr><tr>
				<td align="right" colspan="3" rowspan="3">&nbsp;</td>
				<td align="left" colspan="2" rowspan="3" id="terbilang_tampil"></td>
				<td align="left" rowspan="3" width="5%">&nbsp;</td>
			</tr><tr>
				<td align="right" colspan="6">&nbsp;</td>
			</tr>
	</table> -->
      	<table class="table table-striped" width="100%">
			<tr>
			<td width="30%">&nbsp;</td>
			<td width="1%">&nbsp;</td>
			<td  id="norek_tampil" class="col-sm-12 col-sm-offset-6"></td>
			</tr><tr>
				<td id="nama_penyetor_tampil"></td>
			</tr><tr>
				<td id="nominal_tampil"></td>
			</tr><tr>
			<td width="30%">&nbsp;</td>
			<td width="1%">&nbsp;</td>
				<td  id="terbilang_tampil"></td>
			</tr>
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onclick="window.print();">Print</button>
      </div>
    </div>
  </div>
</div>

<!-- <tr>
				<td rowspan="3">&nbsp;</td>
				<td align="left" colspan="2" >
				<td colspan="3" rowspan="3">&nbsp;</td>
			</tr><tr>
				<td align="left" colspan="2">
				<div style="position:relative;left:-80px;top:-12px" id="nama_dokter_tampil2"></div></td>
			</tr><tr>
				<td align="left" colspan="2">
					<div style="position:relative;left:-60px;top:-12px" id="nama_penyetor_tampil"></div>
				</td>
			</tr><tr>
				<td align="right"  colspan="3" width="55%">&nbsp;</td>
				<td align="center" width="7%">Rp.</td>
				<td  colspan="2	" align="left" id="nominal_tampil"></td>
			</tr><tr>
				<td align="right" colspan="6">&nbsp;</td>
			</tr><tr>
				<td align="right" colspan="3" rowspan="3">&nbsp;</td>
				<td align="left" colspan="2" rowspan="3" id="terbilang_tampil"> RUPIAH</td>
				<td align="left" rowspan="3" width="5%">&nbsp;</td>
			</tr>
				<td align="right" colspan="6">&nbsp;</td>
			</tr> -->