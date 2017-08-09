
<script> 

 $(document).ready(function(){

  
     $('#b_brg_it').click(function(event){ 
        var nama_barang 	= $('input:text[name=nama_barang]');
        var umur_thn 		= $('select[name=umur_thn]'); 
        var jumlah 			= $('input:text[name=jumlah]');
        var ket 			= $('textarea[name=ket]');   
        var url 			="models/inventori_it/simpan_brg_it.php";
        var string 			= $("#f_brg_it").serialize(); 
        
        if(nama_barang.val().length==0){
        nama_barang.focus();
        return false;
        }
        if(umur_thn.val().length==0){
        umur_thn.focus();
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
            $("#m_brg_it").modal('hide');  
            //alert(data);
            location.reload();
          }
        });
        
      });


  $(".t_brg_it,.e_brg_it").click(function(){
    var id = $(this).attr("data-id");
    $("#m_brg_it").modal('show');
    $.ajax({
      type  : "POST",
      url   : "controllers/inventori_it/f_brg_it.php",
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
    $(".modal-title").text("Edit Data Barang");
    }else{
    $(".modal-title").text("Tambah Data Barang ");
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
      url   : "controllers/inventori_it/hapus_brg_it.php",
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
  <h3 class="box-title">Data Barang IT</h3>
</div><!-- /.box-header -->
<div class="box-body">
<div class="table-responsive">
<table id="table_brg_it" class="table table-bordered table-striped datatable">
    <thead>
     <tr class="bg-orange">
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Stok</th>
        <th>Taksiran Umur (Tahun)</th>
        <th>Dekripsi</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $sql=$mysqli->query("select * from barang_it order by nama_barang");
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
      $sql_stok=$mysqli->query("SELECT COUNT(id_barang) as use_barang FROM `printer` where id_barang='$data[id_barang_it]' ");
      $data_stok = $sql_stok->fetch_array();
      $sisa_stok = $data[jumlah] - $data_stok[use_barang];
      if ($sisa_stok > 0) {
        $r_sisa_stok = $sisa_stok;
      }else{
        $r_sisa_stok = $data[jumlah];
      }
        echo"<tr>
          <td>$no</td>
          <td> $data[nama_barang]</td>
          <td> $data[jumlah]</td>
          <td> $sisa_stok</td>
          <td> $data[umur_thn]</td>
          <td>$data[ket]</td>
          <td>  
            <a href='#' onclick='' class='e_brg_it' data-id='$data[id_barang_it]'>
              <i class='fa fa-pencil-square-o'></i>
            </a>
          </td>
        </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
  </div>
  </div>
  <button class='btn btn-warning btn-sm btn-flat t_brg_it' data-id='0'>Tambah Barang</button>
  <br/>


<br/><!-- 
<div class="box-header">
  <h3 class="box-title">Data Barang IT (Rusak) </h3>
</div>//.box-header 
<div class="box-body">
<div class="table-responsive">
<table id="" class="table table-bordered table-striped datatable">
    <thead>
     <tr class="bg-orange">
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Stok</th>
        <th>Taksiran Umur (Tahun)</th>
        <th>Dekripsi</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $sql=$mysqli->query("select * from barang_it order by nama_barang");
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
      $sql_stok=$mysqli->query("SELECT COUNT(id_barang) as use_barang FROM `printer` where id_barang='$data[id_barang_it]' ");
      $data_stok = $sql_stok->fetch_array();
      $sisa_stok = $data[jumlah] - $data_stok[use_barang];
      if ($sisa_stok > 0) {
        $r_sisa_stok = $sisa_stok;
      }else{
        $r_sisa_stok = $data[jumlah];
      }
        echo"<tr>
          <td>$no</td>
          <td> $data[nama_barang]</td>
          <td> $data[jumlah]</td>
          <td> $sisa_stok</td>
          <td> $data[umur_thn]</td>
          <td>$data[ket]</td>
          <td>  
            <a href='#' onclick='' class='e_brg_it' data-id='$data[id_barang_it]' data-toggle='tooltip' title='Edit'>
              <i class='fa fa-pencil-square-o'></i>
            </a>
          </td>
        </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
  </div>
</div>
  <button class='btn btn-warning btn-sm btn-flat t_brg_it' data-id='0'>Tambah Barang</button>
  <br/> -->

<div class="modal fade" id="m_brg_it" role="dialog">
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
          <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_brg_it">Simpan</button>
          <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>


  <script type="text/javascript">
  $(document).ready(function(){
    $('#table_brg_it').DataTable( {
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