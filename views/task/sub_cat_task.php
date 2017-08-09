
<script>
  $(document).ready(function(){


  $(".t_sub_cat,.e_sub_cat").click(function(){
    var id_sub_cat = $(this).attr("data-id");
    $("#m_sub_cat_task").modal('show');
    $.ajax({
      type  : "POST",
      url   : "controllers/task/f_sub_cat_task.php",
      data  : "id_sub_cat="+id_sub_cat,
      success : function(data){
        $(".modal-body").html(data);
         judul_m_sub_cat_task(id_sub_cat);
      }
    });
  }); 


  $("#b_sub_cat_task").click(function(){
    var string = $("#f_sub_task_ca").serialize();
    var sub_cat_id = $("input:text[name=sub_cat_id]");
    var id_cat_task = $("select[name=id_cat_task]");
    var nama_sub_cat = $("input:text[name=nama_sub_cat]");
    var url = "models/task/simpan_sub_task_cat.php";
    //alert(string);
       if(id_cat_task.val().length==0){
       id_cat_task.focus();
       return false;
      }
      if(nama_sub_cat.val().length==0){
       nama_sub_cat.focus();
       return false;
    }
      simpan_sub_cat(url,string);
  });   

 
  });

  function judul_m_sub_cat_task(id){
    if(id!=0){
    $(".modal-title").text("Edit sub kategori task");
    }else{
    $(".modal-title").text("Tambah sub kategori task");
    }
  }

  function simpan_sub_cat(url,string){ 
    $.ajax({
      type  : "POST",
      url   : url,
      data  : string,
      success : function(data){
         $("#m_sub_cat_task").modal('hide');
         //alert(data);
         location.reload();
      }
    }); 
  }

</script>
<!-- Modal Cat Task--> 
  <h3 class="box-title">Data List Sub Kategori </h3>
  <table id="" class="table table-bordered table-striped datatable">
     <thead>
     <tr class="bg-orange">
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Sub Kategori</th>
        <th>Deskripsi</th>
        <th width="5%">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $query=$mysqli->query("SELECT
                          task_cat.nama_task_cat,
                          sub_task_cat.*
                          FROM
                          sub_task_cat
                          INNER JOIN task_cat ON sub_task_cat.id_cat = task_cat.id_task_cat order by sub_task_cat.id_sub_cat desc");
      $cek=mysqli_num_rows($query);
      $no = 1;
      while($data   = $query->fetch_array()){
        echo"<tr>
          <td>$no</td>
          <td> $data[nama_task_cat]</td>
          <td> $data[nama_sub_cat]</td>
          <td> $data[deskripsi]</td>
          <td>  
            <a href='#' onclick='' class='e_sub_cat' data-id='$data[id_sub_cat]'>
              <i class='fa fa-pencil-square-o'></i>
            </a>
          </td>
        </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
  <button class='btn btn-warning btn-sm btn-flat t_sub_cat' data-id='0'>Tambah Kategori Task</button>
  <br/>

  <div class="modal fade" id="m_sub_cat_task" role="dialog">
    <div class="modal-dialog modal-sg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title text-center"></h4>
        </div>
        <div class="modal-body" >
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_sub_cat_task">Simpan</button>
          <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
