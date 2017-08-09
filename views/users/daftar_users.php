
<script> 
$(document).ready(function(){
/*    $("#b_users").click(function(){
       alert('nama masih kosong');
        var string = $("#f_task_cat").serialize();
        var nama_task_cat = $("input:text[name=nama_task_cat]");
        var url = "models/task/simpan_task_cat.php";
         //alert(nama_task_cat.val()); 
         if(nama_task_cat.val().length==0){
          alert('nama masih kosong');
         nama_task_cat.focus();
         return false;
        }
          $.ajax({
          type  : "POST",
          url   : url,
          data  : string,
          success : function(data){
             $("#m_cat_task").modal('hide');
             location.reload();
          }
        }); 
         simpan_cat(url,string);
      });  */

  $(".t_users,.e_users").click(function(){
    var id = $(this).attr("data-id");
    $("#m_users").modal('show');
    $.ajax({
      type  : "POST",
      url   : "controllers/users/f_users.php",
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
    $(".modal-title").text("Edit users");
    }else{
    $(".modal-title").text("Tambah users");
    }
  }

}); 
  function hapus(ID) {
  var id  = ID;
   var pilih = confirm('Users yang akan dihapus  = '+id+ '?');
  if (pilih==true) {
    $.ajax({
      type  : "POST",
      url   : "controllers/users/hapus_users.php",
      data  : "id="+id,
      success : function(data){
        location.reload();
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
        <th>NIK</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $sql=$mysqli->query("select * from users ");
      $cek=mysqli_num_rows($sql);
      $no = 1;
      while($data = $sql->fetch_array()){

        $ambil_pass = $data['password'];
        $hide_pass = $ambil_pass;
        $show_pass = base64_decode($ambil_pass);
        include"views/level_nama.php";
        
        echo"<tr>
          <td>$no</td>
          <td>$data[nik]</td>
          <td> $data[nama]</td>
          <td> $data[j_kel]</td>
          <td> $data[username]</td>
          <td><div>
                  <a href='javascript:void(0);' class='showPass' data-id='$data[nik]'> 
                  <span class='fa fa-eye-slash'></span>
                  </a>
                  $ambil_pass
              </div>
          </td>
          <td> $level</td>
          <td>  
            <a href='#' onclick='' class='e_users' data-id='$data[username]'>
              <i class='fa fa-pencil-square-o'></i>
            </a>|
            <a href='javascript:hapus(\"{$data[username]}\")' class='text-danger'> 
              <i class='fa fa-remove'></i>
            </a>
          </td>
        </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
  <button class='btn btn-warning btn-sm btn-flat t_users' data-id='0'>Tambah Users</button>
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

   

<div class="modal fade" id="m_users" role="dialog">
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
          <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_users">Simpan</button>
          <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

