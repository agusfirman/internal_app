<div class="modal fade" id="m_resume_medis" role="dialog">
    <div class="modal-dialog modal-sg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title text-center"></h4>
        </div>
        <div class="modal-body" >
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_resume_medis">Request</button>
          <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
<br/>
<?php 
$level = $_SESSION[level];
 ?>
<div class="box-body"> 
  <div class="col-md-12">
  <h3 class="box-title"> 
  List Resume Medis </h3>
  <table id="" class="table table-bordered table-striped datatable">
     <thead>
     <tr class="bg-orange">
        <th>No</th>
        <th>Rekam Medis </th>
        <th>Nama Pasien</th>
        <?php 
        if($level==12){
            $thead="<th>User Request</th><th>Date Request</th><th>Keterangan </th>";
            $aksi ='';
          }else if($level==2){
            $thead="<th>Date Request</th><th>User Confirm</th><th>Date Confirm </th><th>Keterangan </th>";
            $aksi ='<th width="5%">Aksi</th>';
          }else{
            $thead="<th>User Request</th><th>Date Request</th>
                    <th>User Confirm</th><th>Date Confirm </th><th>Keterangan </th>";
            $aksi ='<th width="5%">Aksi</th>';
          }
          echo $thead;
        ?>
        <th>Status</th>
        <?php echo $aksi; ?>
      </tr>
    </thead>
    <tbody>
    <?php 
      $query=$mysqli->query("select * from trace_resume_medis where status !='done' ");
      $cek=mysqli_num_rows($query);
      $no = 1;
      while($data   = $query->fetch_array()){
      if($data[status]=='open'){
        $bg_st='text-primary';
      }else if($data[status]=='procces'){
        $bg_st='text-orange';
      }else if($data[status]=='done'){
        $bg_st='text-success';
      }else{
        $bg_st='text-default';
      } 
      $users_confirm = $data[users_confirm];
      $date_confirm = $data[date_confirm];
      $users_req  =$data[users_req];
      $date_req = $data[date_req];
      if($users_confirm == "" || $date_confirm ==""){
        $users_confirm = "<b class='text-red'>Not Confirm</b>";
        $date_confirm = "<b class='text-red'>-</b>";
      }

       if($level==2){
            $akses = "
            <td> $data[date_req]</td>
            <td>$users_confirm</td>
            <td>$date_confirm</td>
            <td>$data[keterangan]</td>
            <td>
                  <div style='font-weight:bold;'>
                    <i>
                    <a  class='t_detail_resume ".$bg_st."' data-id='$data[id_resume_medis]' href='javascript:void()'>".strtoupper($data[status])."</a>
                    </i> 
                  </div>
          </td>   
          <td>  
            <a href='#' onclick='' class='e_resume_medis' data-id='$data[id_resume_medis]'>
              <i class='fa fa-pencil-square-o'></i>
            </a>
            <a href='javascript:hapus_resume_medis(\"{$data[id_resume_medis]}\")' class='text-danger'> 
              <i class='fa fa-remove'></i>
            </a>
          </td> ";
        }else if($level==12){
            $akses="
            <td>$data[users_req]</td>
            <td> $data[date_req]</td>
            <td> $data[keterangan]</td>
            <td>
                  <div style='font-weight:bold;'>
                    <i>
                    <a  class='t_detail_resume ".$bg_st."' data-id='$data[id_resume_medis]' href='javascript:void()'>".strtoupper($data[status])."</a>
                    </i> 
                  </div>
          </td>";
        }else{
            $akses = "
            <td>$data[users_confirm]</td>
            <td>$data[date_confirm]</td>
            <td>$data[users_req]</td>
            <td> $data[date_req]</td>
            <td> $data[keterangan]</td>
            <td>
                  <div style='font-weight:bold;'>
                    <i>
                    <a  class='t_detail_resume ".$bg_st."' data-id='$data[id_resume_medis]' href='javascript:void()'>".strtoupper($data[status])."</a>
                    </i> 
                  </div>
            </td>
          <td>  
            <a href='#' onclick='' class='e_resume_medis' data-id='$data[id_resume_medis]'>
              <i class='fa fa-pencil-square-o'></i>
            </a>
            <a href='javascript:hapus_resume_medis(\"{$data[id_resume_medis]}\")' class='text-danger'> 
              <i class='fa fa-remove'></i>
            </a>
          </td>";
        }

        echo"<tr>
          <td>$no</td>
          <td>$data[rekam_medis]</td>
          <td> $data[nama_pasien]</td>
          $akses
        </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
  <?php 
  if($level==12){
    $tombol = "
    <button class='btn btn-sm btn-flat t_resume_medis ' onclick='window.location.reload()' >
    <span class='glyphicon glyphicon-refresh'></span> Refresh</button>
    ";
  }else{
    $tombol = " <button class='btn btn-warning btn-sm btn-flat t_resume_medis' data-id='0'>Request Resume Medis</button>
    <button class='btn btn-sm btn-flat t_resume_medis ' onclick='window.location.reload()' >
    <span class='glyphicon glyphicon-refresh'></span> Refresh</button>
    ";
  } 
      echo $tombol;
     // echo $level;
     ?>
 
  </div>
  </div>

<div class="modal fade" id="m_detail_resume" role="dialog">
    <div class="modal-dialog modal-sm-status">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title text-center">Ubah Status</h4>
        </div>
        <div class="modal-body" >
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_s_detail_resume">Simpan</button>
          <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
  <style type="text/css">
      .modal-sm-status {
          /* new custom width */
          width: 380px;
          /* must be half of the width, minus scrollbar on the left (30px)
          margin-left: -375px; */
      }
  </style>
  <script>

$(document).ready(function(){
 
 $(".t_detail_resume").click(function(){var id = $(this).attr("data-id");
    $("#m_detail_resume").modal('show');
    $.ajax({
      type  : "POST",
      url   : "controllers/resume_medis/f_detail_resume.php",
      data  : "id="+id,
      success : function(data){
        $(".modal-body").html(data);

      }
    });
  }); 


    $("#b_s_detail_resume").click(function(event) {
    event.preventDefault();
      var status = $('input:radio[name=status]:checked').val();
      var status = $('textarea[name=ket]:checked').val();
      var id_resume_medis =$(".id_resume_medis").attr("data-id");
      url = "models/resume_medis/update_status_resume.php";
      $.ajax({
        type  : "POST", 
        url   : url,
        data  : "id_resume_medis="+id_resume_medis+"&status="+status+"&ket="+ket,
        success : function(data){
          $("#m_detail").modal("hide");
            location.reload();
          //alert(data);
        }
      });
    }); 

  $("#b_resume_medis").click(function(){
        var string = $("#f_resume_medis").serialize();
        var rekam_medis = $("input:text[name=rekam_medis]");
        var nama_pasien = $("input:text[name=nama_pasien]");
        var url = "models/resume_medis/simpan_resume_medis.php";
         //alert(nama_task_cat.val()); 

           $(rekam_medis).on('keypress', function(e) {
             var c = e.keyCode || e.charCode;
             switch (c) {
              case 8: case 9: case 27: case 13: return;
              case 65:
               if (e.ctrlKey === true) return;
             }
             if (c < 48 || c > 57) e.preventDefault();
            });

         /*  $(nama_pasien).on('keypress',function(e) {
              var regex = /^[a-zA-Z0-9@]+$/;
              if (regex.test(this.value) !== true)
                this.value = this.value.replace(/[^a-zA-Z0-9@]+/, '');
            });*/

           if(rekam_medis.val().length==0){
             rekam_medis.focus();
             return false;
            }else if(nama_pasien.val().length==0){
             nama_pasien.focus();
             return false;
            }

      //alert(rekam_medis.val());
         simpan_resume_medis(url,string);
      });  

   $(".t_resume_medis, .e_resume_medis").click(function(){
    var id_resume_medis = $(this).attr("data-id");
    $("#m_resume_medis").modal('show');
    $.ajax({
      type  : "POST",
      url   : "controllers/resume_medis/f_resume_medis.php",
      data  : "id_resume_medis="+id_resume_medis,
      success : function(data){
      	//alert(data.id_resume_medis);
        $(".modal-body").html(data);
         judul_m_resume_medis(id_resume_medis);
      }
    });
  }); 



});
   function simpan_resume_medis(url,string){ 
        $.ajax({
          type  : "POST",
          url   : url,
          data  : string,
          success : function(data){
             $("#m_resume_medis").modal('hide');
             location.reload();
             //alert(data);
          }
        }); 
      }


  function judul_m_resume_medis(id_resume_medis){
    if(id_resume_medis!=0){
    $(".modal-title").text("Edit Request Resume");
    }else{
    $(".modal-title").text("Tambah Request Resume");
    }
  }

  //untuk hapus mytask
    function hapus_resume_medis(id_resume_medis) {
      var id_resume_medis   = id_resume_medis;
       var pilih = confirm('ID Resume Medis yang akan dihapus  = '+id_resume_medis+ '?');
      if (pilih==true){
        $.ajax({
          type  : "POST",
          url   : "models/resume_medis/hapus_resume_medis.php",
          data  : "id="+id_resume_medis,
          success : function(data){
            location.reload();
            //alert(data);
          }
        });
      }
    }

</script>