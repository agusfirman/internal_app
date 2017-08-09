
<script> 
$(document).ready(function(){
	$(".t_kamar,.e_kamar").click(function(){
		var id = $(this).attr("data-id");
		$("#m_kamar").modal('show');
		$.ajax({
			type	: "POST",
			url		: "controllers/kamar/f_kamar.php",
			data	: "id="+id,
			success	: function(data){
				$(".modal-body").html(data);
				 judul(id);
			}
		});
	});	

	//upload foto
	
	$(".t_foto").click(function(){
		var id = $(this).attr("data-id");
		//alert(id);
		$("#m_upload").modal('show');
		$.ajax({
			type	: "POST",
			url		: "controllers/kamar/f_upload.php",
			data	: "id="+id,
			success	: function(data){
				$(".modal-body").html(data);
				
			}
		});
	});

	//fungsi judul modal
	function judul(id){
		if(id!=0){
		$(".modal-title").text("Edit Kamar");
		}else{
		$(".modal-title").text("Tambah Kamar");
		}
	}

});	
	function hapus(ID) {
	var id	= ID;
   var pilih = confirm('kamar yang akan dihapus  = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: "POST",
			url		: "controllers/kamar/hapus_kamar.php",
			data	: "id="+id,
			success	: function(data){
				location.reload();
			}
		});
	}
}

</script>
<div class="box-header">
  <h3 class="box-title">Data kamar</h3>
</div><!-- /.box-header -->
<div class="box-body">
	<table class="table table-bordered table-striped datatable table-responsive">
    <thead>
     <tr class="bg-orange">
        <th width="1%">No</th>
		<th width="20%">Nama Kamar</th>
		<th width="15%">Sewa / hari</th>
		<th width="30%">Fasilitas</th>
		<th width="15%">Foto</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $query=mysql_query("select * from room ");
      $cek=mysql_num_rows($query);
      $no = 1;
      while($data = mysql_fetch_array($query)){      
		$foto = $data[foto];
      if($foto !=""){
      		$t_foto =$foto ;
      }else{
      	$t_foto = "
		<button class='btn btn-success btn-sm btn-dm t_foto btn-flat' data-id='$data[id_room]'>Upload Foto</button>";
      }  
        echo"<tr>
           <td>$no</td>
	        <td>$data[nama_room]</td>
	        <td>$data[sewa_hari]</td>
	        <td>$data[fasilitas]</td>
	        <td>$t_foto <span class=''></span></td>
	        <td>
	           <a href='#' onclick='' class='e_kamar' data-id='$data[id_room]'>
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
  
		<button class='btn btn-warning btn-sm btn-dm t_kamar btn-flat' data-id="0">Tambah Kamar</button>
  <br/>
</div><!-- /.box-body -->
</div><!-- /.box -->

	

<div class="modal fade" id="m_kamar" role="dialog">
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
      <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_simpan_kamar">Simpan</button>
      <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
    </div>
  </div>
</div>
</div>


<div class="modal fade" id="m_upload" role="dialog">
    <div class="modal-dialog modal-sg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title text-center">Upload Foto</h4>
        </div>
        <div class="modal-body" >
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_simpan_upload">Upload</button>
          <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
 
 