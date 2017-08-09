
<script>
function edit(ID){
	var id = ID;
	var pilih = confirm('Data yang akan mengubah  = '+id+ '?');
	if (pilih==true) {
			$('#f_t_users').modal('show');
			$('.title').text("EDIT");
	$.ajax({
		type	: "POST",
		url		: "mod/users/cari.php",
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
/*function hapus(ID) {
	var id	= ID;
   var pilih = confirm('Username yang akan dihapus  = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: "POST",
			url		: "mod/users/hapus_users.php",
			data	: "id="+id,
			success	: function(data){
				$("#tampil_data_users").load("mod/users/tampil_users.php");
			}
		});
	}
}*/
</script>
<?php
session_start();
if(isset($_SESSION['username'])&& ($_SESSION['level']==1)) {
include"../../include/koneksi.php";
	$query=$mysqli->query("select * from users ");
	$cek=mysqli_num_rows($query);
		if($cek){
			?>
			<h4>Data Users</h4>
			<div class=" table-responsive">
			<table class="table table-bordered table-striped table-hover dataTable_dokter">
				<thead>
					<tr class="bg-orange">
						<th>No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Password</th>
						<th>Level</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
			<?php
			$no = 1;
			while($data = $query->fetch_array()){
				if($data[level]==1){
					$level = "<font color='green'>administrator</font>";
				}else if($data[level]==2){
					$level = "<font color='orange'>op. keuangan</font>";
				}else if($data[level]==3){
					$level = "<font color='orange'>op. PPB</font>";
				}else if($data[level]==4){
					$level = "<font color='red'>Lainya</font>";
				}
				
				echo"<tr>
					<td>$no</td>
					<td>$data[nik]</td>
					<td> $data[nama]</td>
					<td> $data[username]</td>
					<td> $data[password]</td>
					<td> $level</td>
					<td> 	
						<a href='javascript:edit(\"{$data[username]}\")'>
							<i class='fa fa-pencil-square-o'></i>
						</a>|
						<a href='javascript:hapus(\"{$data[username]}\")' class='text-danger'> 
							<i class='fa fa-remove'></i>
						</a>
					</td>
				</tr>";
				$no++;
			}
		echo"</tbody></table></div>";
			
		echo"<button class='btn btn-warning btn-sm btn-flat' id='t_users'>Tambah Users</button>";
			
		}
	}
	 ?>


<div class="modal fade" id="f_t_users" role="dialog">
<div class="modal-dialog modal-sg">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">x</button>
      <h4 class="modal-title text-center title">Form penambahan users</h4>
    </div>
    <div class="modal-body" >
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_s_t_f_users">Simpan</button>
      <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
    </div>
  </div>
</div>
</div>


<script>
$(document).ready(function(){
	$("#t_users").click(function(e){
		e.preventDefault();
		$("#f_t_users").modal('show');
		$.post('mod/f_t_users.php',function(data){
			$(".modal-body").html(data);
		});
	});

});
</script>