
<script> 
$(document).ready(function(){
  $(".t_level,.e_level").click(function(){
    var id = $(this).attr("data-id");
    $("#m_level").modal('show');
    $.ajax({
      type  : "POST",
      url   : "controllers/users/f_level.php",
      data  : "id="+id,
      success : function(data){
        $(".modal-body").html(data);
         judul(id);
      }
    });
  }); 

  //fungsi judul modal
  function judul(id){
    if(id!=0){
    $(".modal-title").text("Edit Level");
    }else{
    $(".modal-title").text("Tambah Level");
    }
  }

}); 
  function hapus(ID) {
  var id  = ID;
   var pilih = confirm('Users yang akan dihapus  = '+id+ '?');
  if (pilih==true) {
    $.ajax({
      type  : "POST",
      url   : "controllers/users/hapus_level_users.php",
      data  : "id="+id,
      success : function(data){
        alert(data);
        //location.reload();
      }
    });
  }
}

</script>
<br/>
<div class="box-header">
  <h3 class="box-title">Data Users</h3>
</div><!-- /.box-header -->
<div class="box-body">
<table id="" class="table table-bordered table-striped datatable">
    <thead>
     <tr class="bg-orange">
        <th>No</th>
        <th>Nama</th>
        <th>Nama Departemen</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $sql=$mysqli->query("select * from level_users where isdelete='0' ");
      $cek=mysqli_num_rows($sql);
      $no = 1;
      while($data = $sql->fetch_array()){

     /*   $ambil_pass = $data['password'];
        $hide_pass = $ambil_pass;
        $show_pass = base64_decode($ambil_pass);
        include"views/level_nama.php";*/
        
        echo"<tr>
          <td>$no</td>
          <td>$data[nama_level]</td>
          <td> $data[departemen]</td>
          <td>  
            <a href='#' onclick='' class='e_level' data-id='$data[id_level]'>
              <i class='fa fa-pencil-square-o'></i>
            </a>|
            <a href='javascript:hapus(\"{$data[id_level]}\")' class='text-danger'> 
              <i class='fa fa-remove'></i>
            </a>
          </td>
        </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
  <button class='btn btn-warning btn-sm btn-flat t_level' data-id='0'>Tambah Level Users</button>
  <br/>
</div><!-- /.box-body -->

<script>
$(function(){
  $(".showPass").click(function(){ 
   $(this).remove('span');
  var nik = $(this).attr('data-id');
  var icon =$(this).attr('icon').addtext('fa fa-eye-slash');
  alert(icon);
    // if($("[name=password]").attr('type')=='password'){
    // $("[name=password]").text('type','text');
    // }else{
    // $("[name=password]").attr('type','password');
    // }
  });
});
</script>

   

<div class="modal fade" id="m_level" role="dialog">
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
          <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_level">Simpan</button>
          <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

