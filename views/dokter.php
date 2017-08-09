
<script> 
$(document).ready(function(){
	$(".t_dokter,.e_dokter").click(function(){
		var id = $(this).attr("data-id");
		$("#m_dokter").modal('show');
		$.ajax({
			type	: "POST",
			url		: "controllers/dokter/f_dokter.php",
			data	: "id="+id,
			success	: function(data){
				$(".modal-body").html(data);
				 judul(id);
			}
		});
	});	

	//fungsi judul modal
	function judul(id){
		if(id!=0){
		$(".modal-title").text("Edit Rekening");
		}else{
		$(".modal-title").text("Tambah Rekening");
		}
	}

});	
	function hapus(ID) {
	var id	= ID;
   var pilih = confirm('Dokter yang akan dihapus  = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: "POST",
			url		: "controllers/dokter/hapus_dokter.php",
			data	: "id="+id,
			success	: function(data){
				location.reload();
			}
		});
	}
}

</script>
<div class="box-header">
  <h3 class="box-title">Data Dokter</h3>
</div><!-- /.box-header -->
<div class="box-body">
  <table id="" class="table table-bordered table-striped datatable">
    <thead>
     <tr class="bg-orange">
        <th>No</th>
		<th>Nama Pemilik Rekening</th>
		<th>BCA</th>
		<th>CIMB</th>
		<th>Mandiri</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $query=mysql_query("select * from dt_dokter ");
      $cek=mysql_num_rows($query);
      $no = 1;
      while($data = mysql_fetch_array($query)){        
        echo"<tr>
           <td>$no</td>
	        <td>$data[nama_dokter]</td>
	        <td>$data[norek_bca]</td>
	        <td>$data[norek_cimb]</td>
	        <td>$data[norek_mandiri]</td>
	        <td>
	           <a href='#' onclick='' class='e_dokter' data-id='$data[id]'>
					<i class='fa fa-pencil-square-o'></i>
				</a>|
				<a href='javascript:hapus(\"{$data[id]}\")' class='text-danger'> 
					<i class='fa fa-remove'></i>
				</a>
	        </td>
        </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
		<button class='btn btn-warning btn-sm btn-dm t_dokter btn-flat' data-id="0">Tambah Rekening</button>
  <br/>
</div><!-- /.box-body -->
</div><!-- /.box -->

	 

<div class="modal fade" id="m_dokter" role="dialog">
    <div class="modal-dialog modal-sg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title text-center"></h4>
        </div>
        <div class="modal-body" >
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_simpan_dok">Simpan</button>
          <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

