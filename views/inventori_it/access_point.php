<br/>
<div class="box-header">
  <h3 class="box-title">Data Acces Point</h3>
</div><!-- /.box-header -->
<div class="box-body">
<div class="table-responsive">
<table id="table_ap" class="table table-bordered table-striped datatable">
    <thead>
     <tr class="bg-orange">
        <th>No</th>
        <th>SSID</th>
        <th>IP Address</th>
        <th>Lantai</th>
        <th>Lokasi</th>
        <th>Merk</th>
        <th>Type</th>
        <th>Dekripsi</th>
        <th>Aktif</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $sql=$mysqli->query("select * from access_point ORDER BY lantai");
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
          <td>$data[ssid]</td>
          <td> $data[ip_address]</td>
          <td> $data[lantai]</td>
          <td> $data[lokasi]</td>
          <td> $data[merk]</td>
          <td> $data[type]</td>
          <td>$data[ket]</td></td>
          <td> 
          	<label class='switch'>
			       <input type='checkbox' name='switch_aktif' class='switch_aktif' data-id='$data[id_ap]' $is_active_check />
			        <div class='slider round'></div>
           </label>
			</td>
  </div>
		</td>
          <td>  
            <a href='#' onclick='' class='e_ap' data-id='$data[id_ap]'>
              <i class='fa fa-pencil-square-o'></i>
            </a>|
            <a href='javascript:hapus(\"{$data[id_ap]}\")' class='text-danger d_ap'> 
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
  <br/>
  <button class='btn btn-warning btn-sm btn-flat t_ap' data-id='0'>Tambah Accses Point</button>
  <br/>
</div><!-- /.box-body -->

<div class="modal fade" id="m_ap" role="dialog">
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
          <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_ap">Simpan</button>
          <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
	 $('input').on(click, function () {
  	var ckbox = $('.switch_aktif');
    var url = "controllers/inventori_it/is_active.php";
  	var data_id = $(this).attr('data-id');
        if (ckbox.is(':checked')) {
        	var is_active = 1;
        	 $.ajax({
		      type  : "POST",
		      url   : url,
		      data  : "id="+data_id+"&is_active="+is_active,
		      success : function(data){
		        alert(data);
		        //location.reload();
  		      }
  		    });
        } else {
        	var is_active = 0;
        	 $.ajax({
		      type  : "POST",
		      url   : url,
		      data  : "id="+data_id+"&is_active="+is_active,
		      success : function(data){
		       	alert(data);
		       	//location.reload();
  		      }
  		    });
        }
    });

$(document).ready(function(){

     $('#b_ap').click(function(event){ 
        var ssid = $('input:text[name=ssid]');
        var ip_address = $('input:text[name=ip_address]');
        var lantai = $('select[name=lantai]'); 
        var lokasi = $('input:text[name=lokasi]');
        var ket = $('textarea[name=ket]');   
        var url="models/inventori_it/simpan_ap.php";
        var string  = $("#f_ap").serialize(); 
        if(ssid.val().length==0){
        ssid.focus();
        return false;
        }
        if(ip_address.val().length==0){
        ip_address.focus();
        return false;
        }
        if(lantai.val().length==0){
        lantai.focus();
        return false;
        }
        if(lokasi.val().length==0){
        lokasi.focus();
        return false;
        }
     //alert(string); 
      $.ajax({
          type  : "POST",
          url   : url,
          data  : string,
          success : function(data){
          
             $("#m_ap").modal('hide');  
             //alert(data);
             location.reload();
          }
        });
        
      });


  $(".t_ap,.e_ap").click(function(){
    var id = $(this).attr("data-id");
    $("#m_ap").modal('show');
    $.ajax({
      type  : "POST",
      url   : "controllers/inventori_it/f_ap.php",
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
    $(".modal-title").text("Edit Access Point");
    }else{
    $(".modal-title").text("Tambah Access Point");
    }
  }

    $('#table_ap').DataTable( {
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

function hapus(id_ap) {
  var id  = id_ap;
   var pilih = confirm('Users yang akan dihapus  = '+id+ '?');
  if (pilih==true) {
    $.ajax({
      type  : "POST",
      url   : "controllers/inventori_it/hapus_ap.php",
      data  : "id="+id,
      success : function(data){
        //alert(data);
        location.reload();
      }
    });
  }
}
</script>
<style type="text/css">
	/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 30px;
  height: 14px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 0px;
  bottom: -1px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(16px);
  -ms-transform: translateX(16px);
  transform: translateX(16px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 24px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>