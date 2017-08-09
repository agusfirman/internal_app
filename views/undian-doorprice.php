 
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <script src="assets/jQuery/jQuery-2.1.4.min.js"></script>
 <audio src="assets/audio/mission.mp4" autoplay loop></audio>
 <audio class="audioacak" preload="none" loop> 
   <source src="assets/audio/acak.mp3" type="audio/mpeg">
</audio>
<div class="box-body">

     <div class="row">
         <div class="col-md-6" >
         <h5> Daftar Hadiah</h5>
         <marquee behavior="scroll" direction="up"  height="50%"  width="100%" SCROLLDELAY="200">
              <div class="">
                <table class="table">
                 <tr>
                     <tbody>
                    <?php 
                      $query=$mysqli->query("select * FROM
                                        doorprize");
                      $no = 1;
                      while($data = $query->fetch_array()){
                        echo"<tr>
                          <td>$data[nama]</td>
                          <td> $data[qty]</td>
                        </tr>";
                        $no++;
                      }
                      ?>
                    </tbody>
                 </tr>
             </table>
         </div>
         </marquee>
         </div>
         <div class="col-md-6" >
	         <div class="well">
	         <table width="100%">
	             <tr>
	                 <td>
	                     <div id="angka1">0</div>
	                 </td>
	                 <td>
	                     <div id="angka2">0</div>
	                 </td>
	                 <td>
	                     <div id="angka3">0</div>
	                 </td>
	             </tr>
	             <tr>
	                 <td>Pilih Hadiah</td>
	                 <td>
	                 <select name="" id="nama">
	                 <option value="">Silahkan pilih</option>
	                 <?php 
	                  $querynama=$mysqli->query("select id,nama from doorprize order by id desc ");
	                  while($datanama = $querynama->fetch_array()){
	                        echo "<option value='$datanama[id]'>$datanama[nama]</option>";
	                  }
	                  ?>
	                 </select>
	                 </td>
	             </tr>
	         </table>
	             
	         </div>
	           <div class="navbar">
	             <nav class="navbar" style="clear:both;background-color:orange"> 
	                
	                <ul class="nav nav-pills nav-justified btn">
	                    <li >
	                        <a  onclick="simpan();" title="Simpan Pemenang" >
	                            <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
	                        </a>
	                    </li>
	                    <li>
	                        <a onclick="start()" title="Acak No" >
	                             <span class="glyphicon glyphicon-play" aria-hidden="true"></span>
	                        </a>
	                    </li>
	                    <li>
	                        <a onclick="stop();" title="Stop" >
	                             <span class="glyphicon glyphicon-stop" aria-hidden="true"></span>
	                        </a>
	                    </li>
	                </ul>
	             </nav>
	         </div>
         </div>
         <div class="col-md-10">
         <?php 
			$cek_data = mysqli_num_rows($mysqli->query("select * from win_doorprize"));
			if($cek_data){
			  ?>
			<h5>Daftar Pemenang</h5>
			         <hr/>
			         <marquee behavior="scroll" direction="up" height="50%"  width="100%" SCROLLDELAY="200">
			          <table class="table">
			             <tr>
			                 <th>NO Undian</th>
			                 <th>Nama</th>
			             </tr>
			             <tr>
			                 <tbody>
			                <?php 
			                  $query=$mysqli->query("select doorprize.nama,win_doorprize.no_win
			                                      from doorprize inner join win_doorprize
			                                      on doorprize.id = win_doorprize.id_door order by doorprize.id asc");
			                  while($data = $query->fetch_array()){
			                    echo"<tr>
			                      <td> $data[no_win]</td>
			                      <td>$data[nama]</td>
			                    </tr>";
			                    $no++;
			                  }
			                  ?>
			                </tbody>
			             </tr>
			         </table>
			        </marquee>
			  <?php 
			  }
			 ?>
			 </div>
          <div class="navbar" style="bottom:-50px">
             <nav class="navbar"> 
                <marquee style="color:red;font-size:24px;font-weight:bold">
                <blink>
                    Segenap Direksi dan Staff RSIA Grand Family mengucapkan  selamat menjalankan ibadah puasa Ramadhan 2017 / 1438 H
                </blink>  
                </marquee>
             </nav>
            </div>
     </div>
</div>

<script>
 $("#nama").val("");

var a = 0;
var b = 0;
var c = 0;
var t;
var timer_is_on = 0;

function timedCount() {
    $("#angka1").text(a);
    $("#angka2").text(b);
    $("#angka3").text(c);
    a = Math.floor(Math.random() * 2);
    b = Math.floor(Math.random() * 9);
    c = Math.floor(Math.random() * 7);
    t = setTimeout(function(){ timedCount() }, 20);
}

function start() {
     //$("#nama").addtext('disabled', 'disabled');
    var nama = $("#nama").val();
    if(nama.length==0){
        //$("#nama").focus();
        alert("Silahkan pilih Hadiah");
    }else{
        if (!timer_is_on) {
        timer_is_on = 1;
        timedCount();
        $(".audioacak").trigger('play');
        }
    }
    
}

function stop() {
    clearTimeout(t);
    timer_is_on = 0;
    $(".audioacak").trigger('pause');
}
function simpan(){
    var no_win = ($("#angka1").text()+$("#angka2").text()+$("#angka3").text());
    var id_door =$("#nama").val();
    //alert(no_win + id_door);
    if(no_win && id_door !=""){     
            // var r = confirm("Apakah anda yakin..? !");
            // if (r == true) {
                $.ajax({
                    type    : "POST",
                    url     : "models/doorprice/simpan_door.php",
                    data    : "id_door="+id_door+"&no_win="+no_win,
                    success : function(data){
                        location.reload();
                    }
                });  
            //}         
    }else{
        alert("Silahkan pilih hadiah dan acak no undianya..");
    }
   
}
   
$(document).ready(function(){
    $("#nama").change(function() {
         var id_door = $(this).val();
         if(id_door !=""){
            //alert("OK");
             $.ajax({
            type    : "POST",
            url     : "models/doorprice/cek_nama.php",
            data    : "id_door="+id_door,
            success : function(data){
                    if(data =="OK"){
                         //alert("silahkan acak");
                    }else{
                        alert(data);
                    }
                }
             });
         }
    });
});

</script>
<style type="text/css">
   /* body{        
    background-image: url('bg.jpg');
    background-repeat: no-repeat;
    }*/
 @font-face{
    font-family:digital-7; 
      src: local("Digital-7"),
           local("Digital-7"),
           url(Digital-7 Reguler.ttf);
      font-weight: bold;
    }
    #angka1, #angka2, #angka3{
        color:red;
        margin: auto;
        font-size: 180px;
        font-weight: bold;
        width: 80px;
        font-family:digital-7; 
        
    }
    .kiri{
    height: 100%;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
     background-size: 100% 50%;
    }
    ul .btn{
        margin: auto;
    }
 </style>