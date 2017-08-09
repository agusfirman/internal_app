
<script>   


 $(document).ready(function(){

       
     $('#b_ups').click(function(event){ 
        var jumlah 	= $('input:text[name=jumlah]');
        var lokasi 		= $('input:text[name=lokasi]');
        var lantai 		= $('select[name=lantai]'); 
        var merk 		= $('input:text[name=merk]');
        var type 		= $('input:text[name=type]');
        var ket 		= $('textarea[name=ket]');   
        var url 		="models/inventori_it/simpan_ups.php";
        var string 		= $("#f_ups").serialize(); 
        
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
        if(type.val().length==0){
        type.focus();
        return false;
        }
        if(jumlah.val().length==0){
        jumlah.focus();
        return false;
        }
        //alert(string); 
      $.ajax({
          type  : "POST",
          url   : url,
          data  : string,
          success : function(data){
            $("#m_ups").modal('hide');  
            //alert(data);
            location.reload();
          }
        });
        
      });


  $(".t_ups,.e_ups").click(function(){
    var id = $(this).attr("data-id");
    $("#m_ups").modal('show');
    $.ajax({
      type  : "POST",
      url   : "controllers/inventori_it/f_ups.php",
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
    $(".modal-title").text("Edit Data UPS");
    }else{
    $(".modal-title").text("Tambah Data UPS ");
    }
  }

    $('[data-toggle="tooltip"]').tooltip();  

 }); 

function hapus(id) {
  var id  = id;
   var pilih = confirm('Data yang akan dihapus  = '+id+ '?');
  if (pilih==true) {
    $.ajax({
      type  : "POST",
      url   : "controllers/inventori_it/hapus_ups.php",
      data  : "id="+id,
      success : function(data){
        //alert(data);
        location.reload();
      }
    });
  }
}

</script>
<br/>
<div class="box-header">
  <h3 class="box-title">Data UPS</h3>
</div><!-- /.box-header -->
<div class="box-body">
<div class="table-responsive">
<table id="table_ups" class="table table-bordered table-striped datatable">
    <thead>
     <tr class="bg-orange">
        <th>No</th>
        <th>Lokasi</th>
        <th>Lantai</th>
        <th>Merk</th>
        <th>Type</th>
        <th>Jumlah</th>
        <th>Dekripsi</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $sql=$mysqli->query("select * from ups order by lantai ");
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
          <td> $data[merk]</td>
          <td> $data[type]</td>
          <td> $data[jumlah]</td>
          <td>$data[ket]</td>
          <td>  
            <a href='#' onclick='' class='e_ups' data-id='$data[id_ups]' data-toggle='tooltip' title='Edit'>
              <i class='fa fa-pencil-square-o'></i>
            </a>|
            <a href='javascript:hapus(\"{$data[id_ups]}\")' class='text-danger' data-toggle='tooltip' title='Hapus Data'> 
              <i class='fa fa-remove'></i>
            </a>
          </td>
        </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
  </div>
  <button class='btn btn-warning btn-sm btn-flat t_ups' data-id='0'>Tambah UPS</button>
  <br/>
</div><!-- /.box-body -->
<div class="well">
     Jumlah data pemakaian UPS seluruh ruangan  
     <span class="badge">
     <?php 
      $sql_jml =$mysqli->query( "select sum(jumlah) as jumlah from ups ");
      $data_jml = $sql_jml->fetch_array();
      $jml = $data_jml[jumlah];
      echo $jml;
       ?>
      </span>
</div>
<div class="modal fade" id="m_ups" role="dialog">
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
          <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_ups">Simpan</button>
          <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
  $(document).ready(function(){
       $('#table_ups').DataTable( {
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