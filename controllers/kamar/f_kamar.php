<?php 
$id = $_POST[id];
if($id !="0"){
	include"../../include/koneksi.php";
 	$query="select * from room where id_room='$id' ";
 	$query_cari=mysql_query($query);
    $cek=mysql_num_rows($query_cari);
    $data_cari = mysql_fetch_array($query_cari);
    $nama_kamar = $data_cari[nama_room];
    $sewa_hari  = $data_cari[sewa_hari];
    $fasilitas = $data_cari[fasilitas];
}
 ?>
<form class="form-horizontal" id="f_kamar" method="post" action="" enctype="multipart/form-data">
	<div class="form-group">
	<label class="col-sm-4 control-label">Nama Kamar</label>
		<div class="col-sm-6">
			<input type="hidden" class="form-control input-sm span-4" name="id"  value="<?php echo $id; ?>">
			<input type="text" class="form-control input-sm" name="nama_kamar"  value="<?php echo $nama_kamar;?>">
		</div>
	</div>
	<div class="form-group">
	<label class="col-sm-4 control-label">Sewa Perhari</label>
		<div class="col-sm-6">
			<input type="text" class="form-control input-sm" name="sewa"  value="<?php echo $sewa_hari;?>">
		</div>
	</div>
	<div class="form-group norek">
	<label class="col-sm-4 control-label">Fasilitas</label>
		<div class="col-sm-6">
		<textarea name="fasilitas" id="" cols="40" rows="5"><?php echo $fasilitas; ?></textarea>
			<!--<input type="text" class="form-control input-sm" name="norek" value="<?php ?>">
		 <span class="text-muted" style="font-size:7x;color:red">*)Jika Lebih Dari satu berikan Tanda "," untuk pemisahnya.</span>
		 -->
		</div>
	</div>	
</form>


<script type="text/javascript">
// cetak/print-out-bca.php
$(document).ready(function(){
	// $('.norek').css('display','none');
	 
			var id			= $('input:hidden[name=id]');
			var nama_kamar	= $('input:text[name=nama_kamar]');
			var sewa 		= $('input:text[name=sewa]');	
			var fasilitas 	= $('textarea[name=fasilitas]');	
			//var foto 		= $_FILES['foto']['name'];
			
		$('#b_simpan_kamar').bind("click", function(event) {	
		//alert("OK");
			var url="controllers/kamar/simpan_kamar.php";
			var string = $('#f_kamar').serialize();
				
			// if(nama_kamar.val().length==0){
			// nama_kamar.focus();
			// return false;
			// }else if(sewa.val().length==0){
			// 	sewa.focus();
			// return false;
			// }else if(fasilitas.val().length==0){
			// fasilitas.focus();
			// return false;
			// }
			
			 
			$.ajax({
				type	: "POST",
				url		: url,
				data	: string,
				success	: function(data){
					// $("#m_kamar").modal("hide");
					alert(data);
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
	$(sewa).on('keypress', function(e) {
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