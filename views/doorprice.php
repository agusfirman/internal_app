<h4 class="text-center text-red">DAFTAR HADIAH DOORPRICE</h4>
<hr/> 
<div class="row">
	<div class="col-md-4">
		<form id="f_nama_hadiah" class="form-horizontal" action="" method="post" >
		  <div class="form-group">
				<label class="col-sm-4 control-label">Nama</label>
				<div class="col-sm-8">
					<input type="hidden" class="form-control input-sm" name="id_hadiah"  id="id_hadiah" placeholder="Nama" value="0">
					<input type="text" class="form-control input-sm" name="nama_hadiah"  id="nama_hadiah" placeholder="Nama">
				</div>
		  </div>
		  <div class="form-group">
				<label class="col-sm-4 control-label">Jumlah</label>
				<div class="col-sm-8">
					<input type="text" class="form-control input-sm" name="jml_hadiah"  id="jml_hadiah" placeholder="Jumlah">
				</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
			  <button type="submit" class="btn btn-primary btn-sm btn-flat"  id="btn_simpan_hadiah"><span class="glyphicon glyphicon-saved" ></span> 
			  Simpan
			  </button>
			  <button type="reset" class="btn btn-success btn-sm btn-flat"  id="btn_new_bk_tamu"><span class="glyphicon glyphicon-list" ></span> 
			  Baru
			  </button>
			</div>
		  </div>
		</form>
	</div>
	<div class="col-md-8">
		<!-- table  -->
		<div class="box-body">
		  <table id="" class="table table-bordered table-striped datatable">
		    <thead>
		     <tr class="bg-orange">
		        <th width="5%">No</th>
		        <th>Nama</th>        
		        <th width="5%">Jumlah</th>        
		        <th width="10%">Action</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php 
		      $query=$mysqli->query("select * from doorprize ");
		      $cek=mysqli_num_rows($query);
			  $no = 1;
		      while($data = $query->fetch_array()){
		        echo"<tr>
		          <td>$no</td>
		          <td>$data[nama]</td>
		          <td>$data[qty]</td>
		          <td>  
		            <a href='javascript:void(0)' onclick='' class='e_hadiah' data-id='$data[id]' data-name='$data[nama]'  data-qty='$data[qty]' >
		              <i class='fa fa-pencil-square-o'></i>
		            </a>|
		            <a href='javascript:hapus_hadiah(\"{$data[id]}\")' class='text-danger'> 
		              <i class='fa fa-remove'></i>
		            </a>
		          </td>
		        </tr>";
		        $no++;
		      }
		      ?>
		    </tbody>
		  </table>
		</div><!-- /.box-body -->
	</div>
</div>

<script type="text/javascript">
// cetak/print-out-bca.php
$(document).ready(function(){
	$("#btn_simpan_hadiah").click(function(){
 	var string = $("#f_nama_hadiah").serialize();
	var url = "models/doorprice/simpan_hadiah.php";
	var nama_hadiah = $('#nama_hadiah');
		if(nama_hadiah.val().length==0){
			nama_hadiah.focus();
			return false;
		}
			$.ajax({
	          type  : "POST",
	          url   : url,
	          data  : string,
	          success : function(data){
		        //data : "nama_undangan="+nama_undangan,
		        //jika data sukses diambil dari server kita tampilkan
		        alert(data);
		    	}
			});
	});	

$('#nama_undangan').keyup(function(){
    this.value = this.value.toUpperCase();
});
	//buat combo nama dokter ketika di pilih
	$(".e_hadiah").click(function(){
		var id_hadiah = $(this).attr('data-id');
		var nama = $(this).attr('data-name');
		var qty = $(this).attr('data-qty');
		var id = $('#id_hadiah');
		var nama_hadiah = $('#nama_hadiah');
		var jml_hadiah = $('#jml_hadiah');
		/*var id_undangan = $('#id_undangan');
		//var url = "views/ambil_data.php";.*/
		id.val(id_hadiah);
		nama_hadiah.val(nama);
		jml_hadiah.val(qty);
		//  $.ajax({
		// 	type : "POST",
	 //        url  : url,
	 //        dataType: "json",
	 //        data : "id_dokter="+id,
	 //        cache: false,
	 //        success: function(data){
	 //        //jika data sukses diambil dari server kita tampilkan
	 //        //alert(data);
	 //        $("#norek").val(data.norek);
	 //        $("#nama_penyetor").val(data.nama_penyetor);
	 //        $("#alm_penyetor").val(data.alamat);
	 //        $("#telp").val(data.telp);
	 //    	}
		// });
	});
});
//untuk hapus buku tamu
    function hapus_hadiah(id_hadiah) {
      var id_hadiah   = id_hadiah;
       var pilih = confirm('id yang akan dihapus  = '+id_hadiah+ '?');
      if (pilih==true){
        $.ajax({
          type  : "POST",
          url   : "models/doorprice/hapus_hadiah.php",
          data  : "id_hadiah="+id_hadiah,
          success : function(data){
            location.reload();
          }
        });
      }
    }

</script>