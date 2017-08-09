
<script> 
 $(document).ready(function(){

     $('#b_pr').click(function(event){ 
        var lokasi        = $('input:text[name=lokasi]');
        var lantai        = $('select[name=lantai]'); 
        var merk          = $('input:text[name=merk]');
        var seri          = $('input:text[name=seri]');
        var type          = $('select[name=type]');
        var nama_barang   = $('select[name=nama_barang]');
        var ket           = $('textarea[name=ket]');   
        var url           ="models/inventori_it/simpan_pr.php";
        var string        = $("#f_pr").serialize(); 
        if(lokasi.val().length==0){
        lokasi.focus();
        return false;
        }
        if(lantai.val().length==0){
        lantai.focus();
        return false;
        }
        if(merk.val().length==0){
        merk.focus();
        return false;
        }
        if(seri.val().length==0){
        seri.focus();
        return false;
        }
        if(type.val().length==0){
        type.focus();
        return false;
        }
        //alert(string); 
      $.ajax({
          type  : "POST",
          url   : url,
          data  : string,
          success : function(data){
            $("#m_pr").modal('hide');  
            //alert(data);
            location.reload();
          }
        });
        
      });


  $(".t_pr,.e_pr").click(function(){
    var id = $(this).attr("data-id");
    $("#m_pr").modal('show');
    $.ajax({
      type  : "POST",
      url   : "controllers/inventori_it/f_pr.php",
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
    $(".modal-title").text("Edit Printer");
    }else{
    $(".modal-title").text("Tambah Printer ");
    }
  }


 }); 

function hapus(id_ap) {
  var id  = id_ap;
   var pilih = confirm('Data yang akan dihapus  = '+id+ '?');
  if (pilih==true) {
    $.ajax({
      type  : "POST",
      url   : "controllers/inventori_it/hapus_pr.php",
      data  : "id="+id,
      success : function(data){
        //alert(data);
        location.reload();
      }
    });
  }
}
</script>
<hr/>
<div class="box-header">
  <h3 class="box-title"> Perawatan Berkala Printer</h3>
</div><!-- /.box-header -->
<div class="box-body">
<div class="table-responsive">
<table id="table_pr" class="table table-bordered table-striped datatable">
    <thead>
     <tr class="bg-orange">
        <th>No</th>
        <th>Lokasi</th>
        <th>Lantai</th>
        <th>Merk/ Type/ Seri</th>
        <th>Dekripsi</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $sql=$mysqli->query("select printer.*, barang_it.nama_barang from printer left join barang_it ON printer.id_barang = barang_it.id_barang_it order by lantai ");
      $cek=mysqli_num_rows($sql);
      $no = 1;
      while($data = $sql->fetch_array()){

       /* $ambil_pass = $data['password'];
        $hide_pass = $ambil_pass;
        $show_pass = base64_decode($ambil_pass);
        include"views/level_nama.php";*/
        $is_active = $data[is_active];
        if ($is_active==1){
        	$is_active_check = "checked";
        }else{
        	$is_active_check = "";
        }
        echo"<tr>
          <td>$no</td>
          <td> $data[lokasi]</td>
          <td> $data[lantai]</td>
          <td> $data[nama_barang]</td>
          <td>$data[ket]</td>
        </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
  </div>
  <button class='btn btn-warning btn-sm btn-flat t_pr' data-id='0'>Tambah Printer</button>
  <br/>
</div><!-- /.box-body -->


<script type="text/javascript">
  $(document).ready(function(){
       $('#table_pr').DataTable( {
              dom: 'Bfrtip',
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
                  'print'
              ]
          } );
  });
</script>