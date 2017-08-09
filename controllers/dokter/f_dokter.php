<?php 
$id = $_POST[id];
if($id !="0"){
	include"../../include/koneksi.php";
 	$query="select * from dt_dokter where id='$id' ";
 	$query_cari=$mysqli->query($query);
    $cek=mysql_num_rows($query_cari);
    $data_cari = $query_cari->fetch_array();
    $nama_dokter = $data_cari[nama_dokter];
    $bca = $data_cari[norek_bca];
    $cimb = $data_cari[norek_cimb];
    $mandiri = $data_cari[norek_mandiri];
    if($bca !="-"){
    	$norek = $bca;
    	$nama_bank = "<option value='1'>BCA</option>";
    }else if($cimb !="-"){
    	$norek = $cimb;
    	$nama_bank = "<option value='2'>CIMB</option>";
    }else if($mandiri !="-"){
    	$norek = $mandiri;
    	$nama_bank = "<option value='3'>MANDIRI</option>";
    }else{
    	$norek = "";
    	$nama_bank = "<option value=''>Silahkan Pilih</option>";
    }
}else{
	$norek = "";
    $nama_bank = "<option value=''>Silahkan Pilih</option>";
}
 ?>
<form class="form-horizontal" id="f_dokter" method="post" action="">
	<div class="form-group">
	<label class="col-sm-4 control-label">Pemilik Rekening</label>
		<div class="col-sm-6">
		<input type="hidden" class="form-control input-sm span-4" name="id"  value="<?php echo $id; ?>">
		<input type="text" class="form-control input-sm" name="nama_dokter"  value="<?php echo $nama_dokter; ?>">
		</div>
	</div>
	<div class="form-group">
	<label class="col-sm-4 control-label">Nama Bank</label>
		<div class="col-sm-6">
		<select class="form-control" name="nama_bank" >
			<?php echo $nama_bank; ?>
			<option value="1">BCA</option>
			<option value="2">CIMB</option>
			<option value="3">MANDIRI</option>
		</select>
		</div>
	</div>
	<div class="form-group norek">
	<label class="col-sm-4 control-label">No. Rekening</label>
		<div class="col-sm-6">
		<input type="text" class="form-control input-sm" name="norek" value="<?php echo $norek; ?>">
		<!-- <span class="text-muted" style="font-size:7x;color:red">*)Jika Lebih Dari satu berikan Tanda "," untuk pemisahnya.</span>
		 -->
		</div>
	</div>	
</form>


<script type="text/javascript">
// cetak/print-out-bca.php
$(document).ready(function(){
	// $('.norek').css('display','none');
	 
			var id	= $('input:hidden[name=id]');
			var nama_dokter	= $('input:text[name=nama_dokter]');
			var nama_bank 	= $('select[name=nama_bank]');	
			var norek 		= $('input:text[name=norek]');
			
		$('#b_simpan_dok').bind("click", function(event) {	
		//alert("OK");
			var url="controllers/dokter/simpan_dokter.php";
			var string = $('#f_dokter').serialize();
				
			if(nama_dokter.val().length==0){
			nama_dokter.focus();
			return false;
			}else if(nama_bank.val().length==0){
				nama_bank.focus();
			return false;
			}else if(norek.val().length==0){
			norek.focus();
			return false;
			}
			$.ajax({
				type	: "POST",
				url		: url,
				data	: string,
				success	: function(data){
					$("#m_dokter").modal("hide");
					location.reload();
				}
				});

		});
	
	// $(nama_bank).change(function(){
		 // if(nama_bank.val().length==0){
				// nama_bank.focus();
				// $('.norek').css('display','none');
			// return false;
			// }else {
				// $('.norek').css('display','block');
			// }
	// });
	$(norek).on('keypress', function(e) {
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