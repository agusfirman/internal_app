
<!-- Modal Cat Task-->
  <div class="modal fade" id="m_cat_task" role="dialog">
    <div class="modal-dialog modal-sg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title text-center"></h4>
        </div>
        <div class="modal-body" >
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_cat_task">Simpan Task</button>
          <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
<br/>
  <h3 class="box-title">Data List Kategori </h3>
  <table id="" class="table table-bordered table-striped datatable">
     <thead>
     <tr class="bg-orange">
        <th>No</th>
        <th>ID </th>
        <th>Nama Kategori</th>
        <th width="5%">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $query=$mysqli->query("select * from task_cat ");
      $cek=mysqli_num_rows($query);
      $no = 1;
      while($data   = $query->fetch_array()){
        echo"<tr>
          <td>$no</td>
          <td>$data[id_task_cat]</td>
          <td> $data[nama_task_cat]</td>
          <td>
            <a href='#' onclick='' class='e_cat_task' data-id='$data[id_task_cat]'>
              <i class='fa fa-pencil-square-o'></i>
            </a>
            <a href='javascript:hapus_taskcat(\"{$data[id_task_cat]}\")' class='text-danger'>
              <i class='fa fa-remove'></i>
            </a>
          </td>
        </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
  <button class='btn btn-warning btn-sm btn-flat t_cat_task' data-id='0'>Tambah Kategori Task</button>

  <script>
$(document).ready(function(){
  $("#b_cat_task").click(function(){
        var string = $("#f_task_cat").serialize();
        var nama_task_cat = $("input:text[name=nama_task_cat]");
        var url = "models/task/simpan_task_cat.php";
         //alert(nama_task_cat.val());
         if(nama_task_cat.val().length==0){
         nama_task_cat.focus();
         return false;
        }
          $.ajax({
          type  : "POST",
          url   : url,
          data  : string,
          success : function(data){
             $("#m_cat_task").modal('hide');
             alert(data);
             //location.reload();
          }
        });
        // simpan_cat(url,string);
      });

   $(".t_cat_task,.e_cat_task").click(function(){
    var id_cat_task = $(this).attr("data-id");
    $("#m_cat_task").modal('show');
    $.ajax({
      type  : "POST",
      url   : "controllers/task/f_cat_task.php",
      data  : "id_cat_task="+id_cat_task,
      success : function(data){
        $(".modal-body").html(data);
         judul_m_cat_task(id_cat_task);
      }
    });
  });


});
   function simpan_cat(url,string){
        $.ajax({
          type  : "POST",
          url   : url,
          data  : string,
          success : function(data){
             $("#m_cat_task").modal('hide');
             location.reload();
          }
        });
      }


  function judul_m_cat_task(id_cat_task){
    if(id_cat_task!=0){
    $(".modal-title").text("Edit kategori task");
    }else{
    $(".modal-title").text("Tambah kategori task");
    }
  }

  //untuk hapus mytask
    function hapus_taskcat(id_task_cat) {
      var id_task_cat   = id_task_cat;
       var pilih = confirm('id_task_cat yang akan dihapus  = '+id_task_cat+ '?');
      if (pilih==true){
        $.ajax({
          type  : "POST",
          url   : "models/task/hapus_task_cat.php",
          data  : "id_task_cat="+id_task_cat,
          success : function(data){
            location.reload();
          }
        });
      }
    }

</script>
