
<script>
  $(document).ready(function(){
  $(".t_unit,.e_unit").click(function(){
    var id= $(this).attr("data-id");
    $("#m_unit").modal('show');
    $.ajax({
      type  : "POST",
      url   : "controllers/filling/f_units.php",
      data  : "id="+id,
      success : function(data){
        $(".modal-body").html(data);
         judul_m_unit(id_unit);
      }
    });
  }); 


  $("#b_unit").click(function(){
    var string = $("#f_units").serialize();
    var id_departement = $("select[name=id_departement]");
    var nama_unit = $("input:text[name=nama_unit]");
    var deskripsi = $("input:text[name=deskripsi]");
    var url="controllers/filling/simpan_units.php";
   //alert(string);
     $.ajax({
            type    : "POST",
            url     : url,
            data    : string,
            success : function(data){
              //alert(data);
                $("#m_unit").modal("hide");
                location.reload();
            }
            });
  });   

 
  });

  function judul_m_unit(id){
    if(id!=0){
    $(".modal-title").text("Edit Units");
    }else{
    $(".modal-title").text("Tambah Units");
    }
  }

  function simpan_units(url,string){ 
    $.ajax({
      type  : "POST",
      url   : url,
      data  : string,
      success : function(data){
         $("#m_unit").modal('hide');
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
        <th>Nama Unit</th>
        <th>Nama Departement</th>
        <th>Deskripsi</th>
        <th width="5%">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $query=$mysqli->query("SELECT m_departemen.nama_departemen, m_units.* FROM m_units INNER JOIN m_departemen ON m_units.id_departemen = m_departemen.id_departemen order by m_units.id_unit desc");
      $cek=mysqli_num_rows($query);
      $no = 1;
      while($data   = $query->fetch_array()){
        echo"<tr>
          <td>$no</td>
          <td> $data[nama_unit]</td>
          <td> $data[nama_departemen]</td>
          <td> $data[deskripsi]</td>
          <td>  
            <a href='#' onclick='' class='e_unit' data-id='$data[id_unit]'>
              <i class='fa fa-pencil-square-o'></i>
            </a>
          </td>
        </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
  <button class='btn btn-warning btn-sm btn-flat t_unit' data-id='0'>Tambah Unit</button>
  <br/>

  <div class="modal fade" id="m_unit" role="dialog">
    <div class="modal-dialog modal-sg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title text-center"></h4>
        </div>
        <div class="modal-body" >
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_unit">Simpan</button>
          <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>


 <!--  <script type="text/javascript" src="controllers/filling/aplikasi.js"></script> -->