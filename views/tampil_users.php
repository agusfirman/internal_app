
<script>
function edit(ID){
	var id = ID;
	var pilih = confirm('Data yang akan mengubah  = '+id+ '?');
	if (pilih==true) {
			$('#form_edit').modal('show');
	$.ajax({
		type	: "POST",
		url		: "modul/admin/anggota/cari.php",
		data	: "id="+id,
		dataType : "json",				  
		success	: function(data){
			$("#nomor").val(ID);
			$("#identitas").val(data.id);
			$("#anggota").val(data.nama);
			$("#jk").val(data.jk);
			$("#tempat").val(data.tempat);
			$("#tgl").val(data.tgl);
			$("#alamat").val(data.alamat);
			$("#hp").val(data.hp);
			
			$("#nomor").attr("disabled",true);
			return false;
		}
	});
	}
}
function hapus(ID) {
	var id	= ID;
   var pilih = confirm('Username yang akan dihapus  = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: "POST",
			url		: "page/hapus_users.php",
			data	: "id="+id,
			success	: function(data){
				$("#tampil_data_users").load("page/tampil_users.php");
			}
		});
	}
}
</script>
<?php
$base_url = "http://localhost/its_gf";
session_start();
if(isset($_SESSION['username'])&& ($_SESSION['level']==1)) {
include"../include/koneksi.php";
	$query=mysql_query("select * from users ");
	$cek=mysql_num_rows($query);
		if($cek){
			?>
			<div class=" table-responsive">
			<table class="table table-bordered" style="font-size:10px">
				<tr class="bg-primary">
					<th>No</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Password</th>
					<th>Level</th>
					<th>Aksi</th>
				</tr>
			<?php
			$no = 1;
			while($data = mysql_fetch_array($query)){
				if($data[level]==1){
					$level = "<font color='green'>administrator</font>";
				}else if($data[level]==2){
					$level = "<font color='orange'>op. keuangan</font>";
				}else if($data[level]==3){
					$level = "<font color='orange'>op. PPB</font>";
				}
				
				echo"<tr>
					<td>$no</td>
					<td>$data[nik]</td>
					<td> $data[nama]</td>
					<td> $data[username]</td>
					<td> $data[password]</td>
					<td> $level</td>
					<td> 	<a href='javascript:edit(\"{$data[username]}\")'> Edit</a>|| 
								<a href='javascript:hapus(\"{$data[username]}\")' class='text-danger'> Hapus</a></td>
				</tr>";
				$no++;
			}
		echo"</table></div>";
			
		echo"<button class='btn btn-danger btn-sm btn-xs t_users' >Tambah Users</button>";
			
		}
	}
	 ?>
	 
	 <script>
$(document).ready(function(){
			$(document).on('click','.t_users',function(e){
				e.preventDefault();
				$("#f_t_users").modal('show');
				$.post('mod/f_t_users.php',
					function(data){
						$(".modal-body").html(data);
				});
			});	
	
});
	 </script>
<div class="modal fade" id="f_t_users" role="dialog">
    <div class="modal-dialog modal-sg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title text-center">Form penambahan users</h4>
        </div>
        <div class="modal-body" >
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm" id="b_s_t_f_users">Simpan</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>