
<script> 
 $(document).ready(function(){


     $('#b_pc').click(function(event){ 
        var ip_address 	= $('input:text[name=ip_address]');
        var lokasi 		= $('input:text[name=lokasi]');
        var lantai 		= $('select[name=lantai]'); 
        var merk 		= $('input:text[name=merk]');
        var type 		= $('select[name=type]');
        var ket 		= $('textarea[name=ket]');   
        var url 		="models/inventori_it/simpan_pc.php";
        var string 		= $("#f_pc").serialize(); 
        
        if(ip_address.val().length==0){
        ip_address.focus();
        return false;
        }
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
        //alert(string); 
      $.ajax({
          type  : "POST",
          url   : url,
          data  : string,
          success : function(data){
            $("#m_pc").modal('hide');  
            //alert(data);
            location.reload();
          }
        });
        
      });


  $(".t_pc,.e_pc").click(function(){
    var id = $(this).attr("data-id");
    $("#m_pc").modal('show');
    $.ajax({
      type  : "POST",
      url   : "controllers/inventori_it/f_pc.php",
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
    $(".modal-title").text("Edit Data PC");
    }else{
    $(".modal-title").text("Tambah Data PC ");
    }
  }


//     $('input').on('click',function () {
//   	var ckbox = $('#switch_aktif');
// 	var myUrl = "controllers/inventori_it/is_active.php";
//   	var data_id = $(this).attr('data-id');
//         if (ckbox.is(':checked')) {
//         	var is_active = '1';
//         	 $.ajax({
// 		      type  : "POST",
// 		      url   : myUrl,
// 		      data  : "id="+data_id+"&is_active="+is_active,
// 		      success : function(data){
// 		        //alert(data);
// 		        location.reload();
// 		      }
// 		    });
//             //alert('id_ap '+data_id + ' is_active= '+is_active);
//         } else {
//         	var is_active = '0';
//         	//alert('id_ap '+data_id + ' is_active= '+is_active);
//         	 $.ajax({
// 		      type  : "POST",
// 		      url   : myUrl,
// 		      data  : "id="+data_id+"&is_active="+is_active,
// 		      success : function(data){
// 		       // alert(data);
// 		        location.reload();
// 		      }
// 		    });
//         }
//     });

 }); 

function hapus(id) {
  var id  = id;
   var pilih = confirm('Data yang akan dihapus  = '+id+ '?');
  if (pilih==true) {
    $.ajax({
      type  : "POST",
      url   : "controllers/inventori_it/hapus_pc.php",
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
  <h3 class="box-title">Data PC</h3>
</div><!-- /.box-header -->
<div class="box-body">
<div class="table-responsive">
<table id="table_pc" class="table table-bordered table-striped datatable">
    <thead>
     <tr class="bg-orange">
        <th>No</th>
        <th>Ip Address</th>
        <th>Hostname</th>
        <th>Lokasi</th>
        <th>Lantai</th>
        <th>Merk</th>
        <th>Type</th>
        <th>OS</th>
        <th>Dekripsi</th>
        <th width="5%"></th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $sql=$mysqli->query("select * from p_computer order by lantai ");
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
          <td> $data[ip_address]</td>
          <td> $data[hostname]</td>
          <td> $data[lokasi]</td>
          <td> $data[lantai]</td>
          <td> $data[merk]</td>
          <td> $data[type]</td>
          <td> $data[os]</td>
          <td>$data[ket]</td>
          <td>  
            <a href='#' onclick='' class='e_pc' data-id='$data[id_pc]'>
              <i class='fa fa-pencil-square-o'></i>
            </a>|
            <a href='javascript:hapus(\"{$data[id_pc]}\")' class='text-danger'> 
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
  <button class='btn btn-warning btn-sm btn-flat t_pc' data-id='0'>Tambah PC</button>
  <br/>
</div><!-- /.box-body -->

<div class="modal fade" id="m_pc" role="dialog">
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
          <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_pc">Simpan</button>
          <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
  $(document).ready(function(){

          $('#table_pc').DataTable( {
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