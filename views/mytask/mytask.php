<div class="modal fade" id="m_task" role="dialog">
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
          <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_task">Simpan</button>
          <button type="submit" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
<h3 class="box-title">Data List Task</h3>
<!-- form filter tanggal -->
 <form class="form-inline" action="" method="post">
  <div class="form-group">
    <label class="control-label" >Periode Post</label>
    <input type="text" class="form-control datepicker input-small for_task" name="for_task" placeholder="From">
  </div>
  <div class="form-group">
    <input type="text" class="form-control datepicker to_task" name="to_task" placeholder="To">
    <input type="submit" class="btn btn-success btn-sm btn-flat b_priode" name="b_priode" value="Tampil" />
  </div>
</form>

<!-- end form filter tanggal -->
<br/>
<div class="table-responsive">
  <table id="table_task" class="table table-bordered table-hover table-striped datatable" style="font-size: 9px">
     <thead>
     <tr class="bg-orange">
        <th>No</th>
        <th>Subject</th>
        <th>Kategori</th>
        <th>Spesifikasi</th>
        <th>User Create</th>
        <th>Users Finish</th>
        <th>Users Claims</th>
        <th>Users Dept</th>
        <th>Problem / Case</th>
        <th>Solving</th>
        <th>Ext</th>
        <th>Tgl</th>
        <th>Status</th>
        <th width="5%">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php

    if($_POST['b_priode']){
      $for = $_POST['for_task'];
      $to = $_POST['to_task'];
      $pecah_for = explode('/', $for);
      $for_tahun = $pecah_for[2];
      $for_bulan = $pecah_for[1];
      $for_tgl = $pecah_for[0];
      $for_task = $for_tahun.'-'.$for_bulan.'-'.$for_tgl;

      $pecah_to = explode('/', $to);
      $to_tahun = $pecah_to[2];
      $to_bulan = $pecah_to[1];
      $to_tgl = $pecah_to[0];
      $to_task = $to_tahun.'/'.$to_bulan.'-'.$to_tgl;

      $query="SELECT
                          task.*,
                          task_cat.nama_task_cat,
                          sub_task_cat.nama_sub_cat
                          FROM task
                          INNER JOIN task_cat ON task.task_cat = task_cat.id_task_cat
                          INNER JOIN sub_task_cat ON task.task_desc = sub_task_cat.id_sub_cat
                          WHERE task.tgl_post BETWEEN '$for_task' AND '$to_task'
                          order by task.id_task desc";

    }else{
      $query="SELECT
                          task.*,
                          task_cat.nama_task_cat,
                          sub_task_cat.nama_sub_cat
                          FROM task
                          INNER JOIN task_cat ON task.task_cat = task_cat.id_task_cat
                          INNER JOIN sub_task_cat ON task.task_desc = sub_task_cat.id_sub_cat
                          order by task.id_task desc";
    }
      //echo $query;
      $result =$mysqli->query($query);
      $no = 1;

      while($data   = $result->fetch_array()){
      if($data[st_task]=='open'){
        $bg_st='text-primary';
      }else if($data[st_task]=='procces'){
        $bg_st='text-orange';
      }else if($data[st_task]=='done'){
        $bg_st='text-success';
      }else{
        $bg_st='text-default';
      }
      if($data[st_task]=="done"){
          $edit = "<b>NONE</b>";
        }else{
          $edit ="<a href='#' onclick='' class='e_task' data-id='$data[id_task]'>
                    <i class='fa fa-pencil-square-o'></i>
                  </a>";
          }
      $pecah_format_date = explode('-', $data[tgl_post]);
      $tahun = $pecah_format_date[0];
      $bulan = $pecah_format_date[1];
      $tgl = $pecah_format_date[2];
      if($data[st_task]=='done'){
        $dis_st ='disabled';
      }else{
        $dis_st='';
      }
        echo"<tr>
              <td>$no</td>
              <td>$data[subject]</td>
              <td> $data[nama_task_cat]</td>
              <td> $data[nama_sub_cat]</td>
              <td> $data[users_create]</td>
              <td> $data[users_finished]</td>
              <td> $data[users_claims]</td>
              <td> $data[users_dept]</td>
              <td> $data[_case]</td>
              <td> $data[solv]
                <a  class='t_solv' data-id='$data[id_task]' href='#'  >...</a></td>
              <td> $data[ext]</td>
              <td> $tgl/$bulan/$tahun</td>
              <td><div style='font-weight:bold;'>
                    <i>
                    <a  class='t_detail ".$bg_st." ".$dis_st." ' data-id='$data[id_task]' href='#'  >".strtoupper($data[st_task])."</a>
                    </i>
                  </div>
              </td>
              <td>
             ".$edit."
              </td>
            </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
  </div>
  <button class='btn btn-warning btn-sm btn-flat t_task' data-id='0'>Tambah Task</button>
  <!--<button class='btn btn-danger btn-sm btn-flat t_export' target='blank'>Export Task</button>-->
  <br/>
<div class="well col-md-4 pull-right">note*) :
  <div class="text-red">jika status sudah done task tidak diberlakukan fasilitas diedit </div>
</div>


<div class="modal fade" id="m_detail" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title text-center">Ubah Status</h4>
        </div>
        <div class="modal-body" >
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success btn-sm btn-flat" id="b_s_detail_task">Simpan</button>
          <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
  </div>
</div>

<div class="modal fade" id="m_solv" role="dialog">
    <div class="modal-dialog modal-sm">
       Modal content
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title text-center">Pemecahan Masalah/ Solving</h4>
        </div>
        <div class="modal-body" >
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_s_solving">Simpan</button>
          <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
  </div>
</div>
<style type="text/css">
  a.disabled {
   pointer-events: none;
   cursor: default;
  }
</style>

<script>

        $('#table_task').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              'copyHtml5',
              'excelHtml5',
              'csvHtml5',
              'pdfHtml5',
              'print'
          ]
      });
////fungsi tombol simpan modal

// $(document).ready(function(){
//
// });


   //simpan data dari modal
/*    function simpan_task(url,string){
         $.ajax({
          type  : "POST",
          url   : url,
          data  : string,
          success : function(data){
             $("#m_task").modal('hide');
             //alert(data);
             location.reload();
          }
        });
      }*/

// fungsi ubah judul


</script>
